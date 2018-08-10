<?php

namespace App\BusinessLogic;

use Storage;
use Illuminate\Support\Facades\File;

class ImageRepository
{
    private $upload_path = 'uploads/';
    private $full_path = 'app/uploads/';
    private $path = 'uploads/';



    public static  function uploadFile($form_data, $old_name,$folder)
    {
        $self = new self();
        if(!empty($old_name)){
            $self->deleteImage($folder,$old_name);
        }
        $photo = $form_data;
        $extension = $photo->getClientOriginalExtension();
        $allowed_filename = 'image_' . time() . mt_rand() . '.' . $extension;
        $self->storeToFolder($photo, $allowed_filename, $folder);
        return $allowed_filename;
    }

    public function storeToFolder($photo, $filename, $folder)
    {
        $image = $photo->storeAs($this->upload_path . "$folder/", $filename);
        return $image;
    }

    public function deleteImage($folder,$old_name)
    {
        $path = storage_path($this->full_path . "$folder/".$old_name);
        if (File::exists($path)) {
            Storage::delete($this->path . "$folder/".$old_name);
        }

    }


}