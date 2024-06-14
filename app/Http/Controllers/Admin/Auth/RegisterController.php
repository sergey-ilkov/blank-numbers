<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function create()
    {

        return view('admin.auth.register');
    }

    // ? comment
    public function index()
    {

        return view('admin.auth.newRegister');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'unique:users', 'max:250'],
            'email' => ['required', 'email', 'unique:users', 'max:250'],
            'password' => ['required', 'confirmed', 'min:8'],

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'role' => 'admin',
            'password' => Hash::make($request->password),

        ]);
        // dd($request);

        alert(__('Новий користувач створений!'));

        $request->session()->regenerate();

        return redirect()->route('register.create');
    }
}