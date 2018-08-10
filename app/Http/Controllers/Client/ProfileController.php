<?php

namespace App\Http\Controllers\Client;

use App\BusinessLogic\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('client.profile.index');
    }

    public function updateProfileImage(Request $request)
    {

        $user = Auth::user();
        $folder = 'client_profile';
        $old_name = $user->real_image;
        $file = $request->file('image');
        $image_name = ImageRepository::uploadFile($file, $old_name, $folder);
        $user->image = $image_name;
        $user->save();
        return response()->json(['status'=>true]);
    }

    /**
     * @return mixed
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        $user->jobs()->delete();
        return response()->json(['status' => true]);
    }
}
