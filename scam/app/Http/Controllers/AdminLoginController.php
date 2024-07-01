<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {

        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2
        ]);

        if (Auth::checK()) {

            return redirect('/admin-reports')->with('login', 'success');
        } else {

            return back()->with('error', '1');
        }

    }

    public function showLogin()
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            return redirect('/admin-reports')->with('login', 'success');
        }

        return view('admin.Login');
    }
}
