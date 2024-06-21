<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\BlockingUsers\BlockingUsers;


class LoginController extends Controller
{
    //

    public function login(Request $request, BlockingUsers $services)
    {
        if (Auth::check()) {

            return redirect()->route('admin.home');
        }


        if ($services->isBlocked($request)) {

            return view('admin.auth.login')->with('blocking', 'the user is blocked');
        }

        return view('admin.auth.login');
    }


    public function authenticate(Request $request, BlockingUsers $services)
    {


        if ($services->isBlocked($request)) {

            return view('admin.auth.login')->with('blocking', 'the user is blocked');
        }

        $validation = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],

        ]);

        if (Auth::attempt($validation)) {

            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }


        $services->createOrUpdateBlockedUser($request);

        return back()->withErrors([
            'error' => 'wrong login or password',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}