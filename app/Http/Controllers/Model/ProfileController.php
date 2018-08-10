<?php

namespace App\Http\Controllers\Model;

use App\BusinessLogic\ImageRepository;
use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $data['user'] = Auth::user();
        $data['hair_colors'] = Constant::getConstants('hair_color')->childrens;
        $data['hair_styles'] = Constant::getConstants('hair_style')->childrens;
        $data['eyes_colors'] = Constant::getConstants('eyes_color')->childrens;
        $data['skin_colors'] = Constant::getConstants('skin_color')->childrens;
        $data['hair_cuts'] = Constant::getConstants('hair_cut')->childrens;
        return view('model.profile.index',$data);
    }

    public function editProfile()
    {
        $data['user'] = Auth::user();
        $data['hair_colors'] = Constant::getConstants('hair_color')->childrens;
        $data['hair_styles'] = Constant::getConstants('hair_style')->childrens;
        $data['eyes_colors'] = Constant::getConstants('eyes_color')->childrens;
        $data['skin_colors'] = Constant::getConstants('skin_color')->childrens;
        $data['hair_cuts'] = Constant::getConstants('hair_cut')->childrens;
        return view('model.profile.edit',$data);
    }

    /**
     * @return View
     */
    public function show()
    {
        $data['user'] = Auth::user();
        $data['hair_colors'] = Constant::getConstants('hair_color')->childrens;
        $data['hair_styles'] = Constant::getConstants('hair_style')->childrens;
        $data['eyes_colors'] = Constant::getConstants('eyes_color')->childrens;
        $data['skin_colors'] = Constant::getConstants('skin_color')->childrens;
        $data['hair_cuts'] = Constant::getConstants('hair_cut')->childrens;
        return view('model.profile.show', $data);
    }

    /**
     * @param ProfileRequest $request
     * @return mixed
     */
    public function update(ProfileRequest $request)
    {

        $folder = 'profile';
        $user = Auth::user();
        $utype = $request['gender'] == 1 ? 'model' : 'user';
        if ($request->hasFile('img')) {
            $old_name = $user->real_image;
            $file = $request->file('img');
            $image_name = ImageRepository::uploadFile($file, $old_name, $folder);
            $request->merge(['image' => $image_name, 'utype' => $utype]);
            $user->update($request->except(['img']));
        } else {
            $request->merge(['utype' => $utype]);
            $user->update($request->all());
        }
        return redirect()->route('dashboard.model.profile.show');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function upload(Request $request)
    {
        $user = Auth::user();
        $count = UserImage::where('user_id', $user->id)->count();
        if ($count < 6) {
            $folder = 'profile_images';
            $file = $request->file('file');
            $old_name = null;
            $image_name = ImageRepository::uploadFile($file, $old_name, $folder);
            UserImage::create(['name' => $image_name, 'user_id' => $user->id]);
            $view = View::make('partial.user-image', compact('image_name'))->render();
            return response()->json(['status' => true, 'file_name' => $image_name, 'view' => $view]);
        } else {
            return response()->json(['status' => false]);
        }

    }
    
    /**
     * @return mixed
     */
    public function destroy(){
        $user = Auth::user();
        $user->delete();
        return response()->json(['status'=>true]);
    }
}
