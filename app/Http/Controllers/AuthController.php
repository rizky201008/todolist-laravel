<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login", ["title" => "Login Page"]);
    }
    public function register()
    {
        return view("auth.register", ["title" => "Register Page"]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/");
        }
        return back()->withErrors("Login Failed!!!");
    }
    public function store(Request $request)
    {
        $v = $request->validate(
            [
                "name" => "required|min:3|string",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:8"
            ]
        );
        $save = User::insert([
            "name" => $v['name'],
            "email" => $v["email"],
            "password" => bcrypt($v['password'])
        ]);
        if (!$save) {
            return back()->withErrors("Register Failed!!!");
        } else {
            return redirect("/login");
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
