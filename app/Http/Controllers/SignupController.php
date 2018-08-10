<?php

namespace App\Http\Controllers;

use App\BusinessLogic\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Storage;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function userSignup()
    {
        return view('client.signup');
    }

    public function modelSignup()
    {
        return view('model.signup');
    }

    public function userSign(SignupRequest $request)
    {
        $utype = $request->get('utype');
        if ($utype == 'user' || $utype == 'model') {
            $user = new User();
            $user->utype = $request->get('utype');
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->username = $request->get('username');
            $user->location = $request->get('location');
            $user->password = Hash::make($request->get('password'));
            $user->phone = $request->get('phone');
            if ($request->hasFile('avtars')) {
                $folder = 'profile';
                $file = $request->file('avtars');
                $old_name='';
                $image_name = ImageRepository::uploadFile($file, $old_name, $folder);
                $user->imgs = $image_name;
            }
            $user->emailcode = base64_encode($request->get('email'));
            $user->save();

            $login_type = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)
                ? 'email'
                : 'username';

            $request->merge([
                $login_type => $request->input('username'),
                'password' => Input::get('password')
            ]);

            if (Auth::attempt($request->only('username', 'password'))) {
                if ($utype == 'model') return Redirect::to('/dashboard/model/profile');
                return redirect()->route('dashboard.client.job.create');
            } else {
                return Redirect::to('/');
            }
        } else {
            return Redirect::back()->withErrors(['User Type Error.']);
        }
    }

}
