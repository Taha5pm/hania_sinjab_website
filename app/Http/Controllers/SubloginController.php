<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


use Illuminate\Http\Request;

class SubloginController extends Controller
{
    public function index()
    {
        return view('sub_login');
    }
    public function check(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('course.index');
        }
        throw ValidationException::withMessages([
            'error' => "Incorrect email or password",
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
