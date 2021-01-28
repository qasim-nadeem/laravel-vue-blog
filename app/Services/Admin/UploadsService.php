<?php


namespace App\Services\Admin;

use Illuminate\Support\Facades\File;

class UploadsService
{
    public function uploadCategoryImage($file)
    {
        $fileName = time().'.'.$file->extension();
        try {
            $file->move(public_path('uploads/category'),$fileName);
            return $fileName;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function removeImage($path,$fileName){
        File::delete($path.'/'.$fileName);
        return true;
    }
}
