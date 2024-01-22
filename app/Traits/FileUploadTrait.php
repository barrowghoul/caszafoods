<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait{
    function uploadImage(Request $request, $inputName, $oldPath = Null, $path = "/images") : string {
        if($request->hasFile($inputName)){
            $this->deletePreviousImageIfExists($oldPath);
            $image = $request->{$inputName};
            $imageName = $this->generateUniqueName($image);

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
        return $oldPath;
    }

    function generateUniqueName($fileName) : string {
        $ext = $fileName->getClientOriginalExtension();
        $imageName = 'media_' . uniqid() . '.' . $ext;

        return $imageName;
    }

    function deletePreviousImageIfExists($path) : void {
        if($this->isNotDefaultImage($path))
        {
            if($path && File::exists(public_path($path)))
            {
                File::delete(public_path($path));
            }
        }
    }

    function isNotDefaultImage($path) : bool {
        $fileName = pathinfo($path);

        if($fileName['filename'] === 'default')
        {
            return false;
        }

        return true;
    }
}
