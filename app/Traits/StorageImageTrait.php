<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
  
trait StorageImageTrait
{
    /* Upload */
    public function storagetrait($request, $fieldName, $folderPlace)
    { 
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            // $filepath = $request->file($fieldName)->storeAs('public/' . $folderPlace, $fileNameHash);
            // $dataUpload = [
            //     'file_name' => $fileNameOrigin,
            //     'file_path' => Storage::url($filepath),
            // ];  

            $destinationPath = public_path('storage/' . $folderPlace);
 
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
 
            $file->move($destinationPath, $fileNameHash);

            $dataUpload = [
                'file_name' => $fileNameOrigin,
                'file_path' => asset('storage/' . $folderPlace . '/' . $fileNameHash),
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