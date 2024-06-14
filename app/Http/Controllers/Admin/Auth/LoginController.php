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

        // dd($services->isBlocked($request));

        // ? проверяем заблокирован ли пользователь
        if ($services->isBlocked($request)) {

            return view('admin.auth.login')->with('blocking', 'the user is blocked');
        }

        return view('admin.auth.login');
    }


    public function authenticate(Request $request, BlockingUsers $services)
    {

        // ? проверяем заблокирован ли пользователь
        if ($services->isBlocked($request)) {

            return view('admin.auth.login')->with('blocking', 'the user is blocked');
        }

        $validation = $request->validate([
            'name' => ['required', 'string'],
            // 'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],

        ]);

        if (Auth::attempt($validation)) {

            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        // ? добавляем пользователя в таблицу блокировки
        $services->createOrUpdateBlockedUser($request);

        return back()->withErrors([
            'error' => 'wrong login or password',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        //? генирация нового идентификатора для сессии пользователя
        $request->session()->invalidate();
        //? генирация нового csrf token
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
