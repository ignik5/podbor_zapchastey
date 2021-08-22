<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('User.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt([
            'email' =>$request->email,
            'password' =>$request->password,
        ]))
        {
            session()->flash('success', 'Вы авторизованы');
            return redirect()->route('catalog.index');
        }
        else{
            return redirect()->back()->with('error', 'Неправильный логин или пароль');//делаем редирект обратно с сообщением
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
