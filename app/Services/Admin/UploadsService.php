<?php


namespace App\Services\Admin;

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
}
