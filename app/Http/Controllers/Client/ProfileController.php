<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){
        return view('client.profile.index');
    }

    /**
     * @return mixed
     */
    public function destroy(){
        $user = Auth::user();
        $user->delete();
        $user->jobs()->delete();
        return response()->json(['status'=>true]);
    }
}
