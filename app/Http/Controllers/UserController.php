<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(){

        return view('auth.register');

    }
    public function login(){

        return view('auth.login');

    }
    public function loginUser(LoginUserRequest $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('loginsuccess', 'login success');
        }
        return back()->with('error', 'Wrong credentials');
    }
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RegisterUserRequest  $request
     */
    public function store(RegisterUserRequest $request)
    {
        // dd($request->all());
        $user = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('loginsuccess', 'login success');
    }
}
