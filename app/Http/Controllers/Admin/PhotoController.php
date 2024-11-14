<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PhotoModel;
use App\Http\Requests\PhotoAddRequest;
use App\Http\Requests\PhotoEditRequest;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $photo;
    public function __construct(PhotoModel $photo)
    {
        $this->photo = $photo;
    }
    public function index(Request $request, $type)
    { 
        $search = $request->input('search_keyword'); 
        $sliders = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $sliders = $this->photo::select('id', 'name', 'desc', 'photo_path')
                ->where('name', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $sliders->setPath('slider?search_keyword=' . $search);

        } else { 
            $sliders = $this->photo->where('type', $type)->latest()->paginate(10);
        } 

        return view('admin.photo.index', compact('type', 'sliders'));
    }
    public function static(Request $request)
    { 
        $photo = null;
        $photo = $this->photo->where('type', 'logo')->first();
        return view('admin.photo.static', compact('photo'));
    }
    public function create($type)
    { 
        return view('admin.photo.add', compact('type'));
    }
    public function store(PhotoAddRequest $request, $type)
    { 
        try {
            
            $dataCreate = [
                'name' => $request->name,
                'desc' => $request->desc ?? '',
                'type' => $type,
            ];
            $dataPhotoSlider = $this->storagetrait($request, 'photo_path', 'slider');
            
            if (!empty($dataPhotoSlider)) {
                $dataCreate['photo_name'] = $dataPhotoSlider['file_name'];
                $dataCreate['photo_path'] = $dataPhotoSlider['file_path'];
            }
            $this->photo->create($dataCreate); 
            return redirect()->route('photo.index', ['type' => $type]);
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function edit($type, $id)
    {
        $slider = $this->photo->find($id); 
        return view('admin.photo.edit', compact('type', 'slider'));
    }
    public function update(PhotoEditRequest $request, $type ,$id)
    {
        try { 
            $photo = $this->photo->findOrFail($id); 
    
            $dataUpdate = [
                'name' => $request->name,
                'desc' => $request->desc ?? '',
            ];
    
            $dataPhotoSlider = $this->storagetrait($request, 'photo_path', 'slider');
            if (!empty($dataPhotoSlider)) {
                $dataUpdate['photo_name'] = $dataPhotoSlider['file_name'];
                $dataUpdate['photo_path'] = $dataPhotoSlider['file_path'];
            }
    
            $photo->update($dataUpdate);
    
            return redirect()->route('photo.index',  ['type' => $type]);

        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());

        }
    }
    public function delete($id, $type)
    {
        return $this->deleteModelTrait($id, $this->photo);

    }
}
