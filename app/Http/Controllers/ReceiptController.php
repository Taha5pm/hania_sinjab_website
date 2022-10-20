<?php

namespace App\Http\Controllers;

use App\Models\receipt;
use App\Models\course;
use App\Models\User;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::all()->where('id', '=', $id);
        $receipts = receipt::select('*')->where('user_id', '=', $id)->orderBy('id', 'desc')->get();
        $courses = course::all();

        return view('superadmin.subscriber_receipts', ['user' => $user, 'receipts' => $receipts, 'courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     * @param
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $user = User::all()->where('id', '=', $id);
        $courses = course::all();
        return view('superadmin.make_receipt', ['user' => $user, 'courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $receipt = new receipt();
        $course_price = course::all()->where('id', '=', $request->course_id)->value('price');
        $expired = receipt::all()->where('user_id', $id)->where('course_id', $request->course_id)
            ->where('expire_date', '>', '20' . today()->format('y-m-d'))->value('id');

        if ($expired == null) {
            $receipt->user_id = $id;
            $receipt->course_id = $request->course_id;
            $receipt->amount_paid = 0; //$request->amount_paid;
            // $receipt->amount_left = strval(intval($course_price) - intval($request->amount_paid));
            $receipt->expire_date = $request->expire_date;
            $receipt->save();
            return redirect()->route('superadmin.subscriber.receipt', $id);
        } else {
            return Redirect::back()->withErrors(['msg' => 'The user is already subscribed to this course and the subscribtion is not expired yet']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receipt = receipt::all()->where('id', '=', $id);
        $user = User::all()->where('id', '=', $receipt->value('user_id'));
        $sub_courses = receipt::all()->where('user_id', '=', $receipt->value('user_id'))
            ->where('expire_date', '>', '20' . today()->format('y-m-d'))
            ->where('course_id', '!=', $receipt->value('course_id'))->value('course_id');
        $courses = course::all()->whereNotIn('id', $sub_courses);
        return view('superadmin.edit_receipt', ['receipt' => $receipt, 'user' => $user, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vali = $request->validate([
            'course_id' => ['required'],
            'expire_date' => ['required'],
        ]);

        receipt::where('id', '=', $id)->update([
            'course_id' => $request->course_id,
            'expire_date' => $request->expire_date
        ]);
        $user_id = receipt::all()->where('id', '=', $id)->value('user_id');
        return redirect()->route('superadmin.subscriber.receipt', $user_id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user_id = receipt::all()->where('id', '=', $id)->value('user_id');
        receipt::where('id', '=', $id)->delete();
        return redirect()->route('superadmin.subscriber.receipt', $user_id);
    }
}
