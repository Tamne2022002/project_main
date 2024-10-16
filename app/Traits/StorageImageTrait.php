<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
 


trait StorageImageTrait
{
    /* Upload */
    public function storagetrait($request, $fieldName, $folderPlace)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filepath = $request->file($fieldName)->storeAs('public/' . $folderPlace . '/' . auth()->id(), $fileNameHash);
            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath),
            ];
            return $dataUpload;
        }
        return null; 
    }
    public function storagetraitmultiple($file, $folderPlace)
    { 
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filepath = $file->storeAs('public/' . $folderPlace . '/' . auth()->id(), $fileNameHash);
            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath),
            ];
            return $dataUpload;        
    }

}