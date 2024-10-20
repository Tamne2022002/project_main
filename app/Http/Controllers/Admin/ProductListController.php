<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\ProductListModel;
use App\Traits\DeleteModelTrait;

class ProductListController extends Controller
{
    use DeleteModelTrait;

    private $category;
    public function __construct(ProductListModel $category)
    {

        $this->category = $category;
    }
    public function create()
    {
        $categoryoption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('categoryoption'));
    }
    public function index(Request $request)
    {
        $search = $request->input('search_keyword'); 
        $categories = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $categories = $this->category::select('id', 'name')
                ->where('name', 'LIKE', $searchUnicode)
                ->paginate(10);
            $categories->setPath('categories?search_keyword=' . $search);
        } else {
            $categories = $this->category::latest()->paginate(10);
        }


        return view('admin.category.index', compact('categories'));
    }
    public function store(CategoryAddRequest $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->filled('status') ? $request->status : false,
            'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
        ]);
        return redirect()->route('categories.index');
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $categoryoption = $recusive->categoryRecusive($parentId);
        return $categoryoption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $categoryoption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'categoryoption'));
    }
    public function update($id, CategoryEditRequest $request)
    {

        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->filled('status') ? $request->status : false,
            'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
        ]);
        return redirect()->route('categories.index');

    }
    public function delete($id)
    {

        return $this->deleteModelTrait($id, $this->category);

    }
}
