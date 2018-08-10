<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\UserImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Storage;

class ImageHandler extends Controller {

    public function getDefaultImage($folder, $name){
        $path = storage_path("app/uploads/$folder/".$name);
        
        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');

        return $response;
    }
    public function removeImage($name){
        $path = storage_path("app/uploads/profile_images/".$name);
        if (File::exists($path)) {
            Storage::delete("uploads/profile_images/".$name);
            UserImage::where('name',$name)->delete();
        }

        return response()->json(['status'=>true]);
    }

}
