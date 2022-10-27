<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginForm()
    {
        return view('auth.login');
    }




    public function authenticate(Request $request)
    {


        if (Auth::attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->filled('remember')
        )) {

            return redirect('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }



    protected function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
