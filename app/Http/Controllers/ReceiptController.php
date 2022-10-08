<?php

namespace App\Http\Controllers;

use App\Models\receipt;
use App\Models\course;
use App\Models\User;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $receipt->user_id = $id;
        $receipt->course_id = $request->course_id;
        $receipt->amount_paid = $request->amount_paid;
        $receipt->amount_left = strval(intval($course_price) - intval($request->amount_paid));
        $receipt->expire_date = $request->expire_date;
        $receipt->save();

        return redirect()->route('superadmin.subscriber.receipt', $id);
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
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(receipt $receipt)
    {
        //
    }
}
