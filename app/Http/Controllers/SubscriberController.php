<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SubscriberController extends Controller
{
    public function index()
    {
        return view('superadmin.add_subscriber');
    }
    public function index_admin()
    {
        return view('superadmin.add_admin');
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub = new User();
        $sub->fname = $request->fname;
        $sub->lname = $request->lname;
        $sub->email = $request->email;
        $sub->role = $request->role;
        $sub->password = Hash::make($request->password);
        $sub->save();

        if ($request->role == 'subscriber') {
            return redirect()->route('superadmin.subscriber');
        } else {
            return redirect()->route('superadmin.subscriber.admin');
        }
    }
    public function show()
    {
        $subs = User::select('*')->where('role', '=', 'subscriber')->orderBy('id', 'desc')->get();
        return view('superadmin.show_subscribers', ['subs' => $subs]);
    }
    public function show_admin()
    {
        $admins = User::select('*')->where('role', '=', 'admin')->orderBy('id', 'desc')->get();
        return view('superadmin.show_admins', ['admins' => $admins]);
    }

    /**
     * Show the form for editing the specified resource.
     *@param int $id
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriber = User::all()->where('id', '=', $id);

        if ($subscriber->value('role') == 'subscriber') {
            return view('superadmin.edit_subscriber', ['sub' => $subscriber]);
        } else {
            return view('superadmin.edit_admin', ['admin' => $subscriber]);
        }
    }


    /**
     * Update the specified resource in storage.
     *@param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sub = User::where('id', '=', $id)->update([
            'fname' => $request->fname, 'lname' => $request->lname,
            'email' => $request->email,
        ]);
        $sub = User::all()->where('id', '=', $id);

        if ($sub->value('role') == 'subscriber') {
            return redirect()->route('superadmin.subscriber.show');
        } else {
            return redirect()->route('superadmin.subscriber.admin.show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *@param int $id
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user_role = User::all()->where('id', '=', $id)->value('role');

        User::where('id', '=', $id)->delete();

        if ($user_role == 'subscriber') {
            return redirect()->route('superadmin.subscriber.show');
        } else {
            return redirect()->route('superadmin.subscriber.admin.show');
        }
    }
}
