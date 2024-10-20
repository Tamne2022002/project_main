<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;
use App\Http\Requests\PublisherAddRequest;
use App\Http\Requests\PublisherEditRequest;
use App\Models\PublisherModel;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;
 

class PublisherController extends Controller
{
    use StorageImageTrait,DeleteModelTrait;
    private $publisher;
    public function __construct(PublisherModel $publisher)
    {
        $this->publisher = $publisher;
    }
    public function getPublishers()
    {
        return Publisher::all();  
    }
    public function index(Request $request)
    { 
        $search = $request->input('search_keyword');
        $publishers = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $publishers = $this->publisher::select('id', 'name',"photo_path")
                ->where('name', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
                $publishers->setPath('publisher?search_keyword=' . $search);
        } else {
            $publishers = $this->publisher->latest()->paginate(10);
        }
       
        return view('admin.publisher.index', compact('publishers'));
    }
    public function create()
    {

        return view('admin.publisher.add');
    }
    public function store(PublisherAddRequest $request)
    {
        try {
            $dataCreate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoPublisher = $this->storagetrait($request, 'photo_path', 'publisher');

            if (!empty($dataPhotoPublisher)) {
                $dataCreate['photo_name'] = $dataPhotoPublisher['file_name'];
                $dataCreate['photo_path'] = $dataPhotoPublisher['file_path'];
            }
            $this->publisher->create($dataCreate);
            return redirect()->route('publisher.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        } 
    }
    public function edit($id)
    {
        $publisher = $this->publisher->find($id);
        return view('admin.publisher.edit', compact('publisher'));
    }
    public function update(PublisherEditRequest $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataPhotoPublisher = $this->storagetrait($request, 'photo_path', 'publisher');
            if (!empty($dataPhotoPublisher)) {
                $dataUpdate['photo_name'] = $dataPhotoPublisher['file_name'];
                $dataUpdate['photo_path'] = $dataPhotoPublisher['file_path'];
            }
            $this->publisher->find($id)->update($dataUpdate);
            return redirect()->route('publisher.index');

        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());

        }
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id,$this->publisher);

    }
}
