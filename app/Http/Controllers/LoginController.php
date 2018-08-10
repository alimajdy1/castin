<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginUser(LoginRequest $request)
    {
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login'),
            'password' => Input::get('password')
        ]);
        if (Auth::attempt($request->only($login_type, 'password'))) {
            if (Auth::user()->utype == 'model') return redirect()->route('dashboard.model.profile.index');
            return redirect()->route('dashboard.client.profile.index');
        } else {
            return Redirect::back()->withErrors(['Wrong username or password.']);
        }

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}


