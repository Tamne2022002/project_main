<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductListAddRequest;
use App\Http\Requests\ProductListEditRequest;
use App\Models\ProductListModel;
use App\Traits\DeleteModelTrait;
use App\Components\Recusive;


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
        return view('admin.productList.add', compact('categoryoption'));
    }
    public function index(Request $request)
    {
        $search = $request->input('search_keyword'); 
        $categories = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $categories = ProductListModel::select('id', 'name')
                ->where('name', 'LIKE', $searchUnicode)
                ->paginate(10);
            $categories->setPath('categories?search_keyword=' . $search);
        } else {
            $categories = ProductListModel::latest()->paginate(10);
        }


        return view('admin.productList.index', compact('categories'));
    }
    public function store(ProductListAddRequest $request)
    {
        ProductListModel::create([
            'name' => $request->name,
            'id_parent' => $request->id_parent,
            'status' => $request->filled('status') ? $request->status : false,
            'featured' => $request->filled('featured') ? $request->featured : false,
        ]);
        return redirect()->route('productList.index');
    }
    public function getCategory($parentId)
    {
        $data = ProductListModel::all();
        $recusive = new Recusive($data);
        $categoryoption = $recusive->categoryRecusive($parentId);
        return $categoryoption;
    }

    public function edit($id)
    {
        $category =  ProductListModel::find($id);
        $categoryoption = $this->getCategory($category->id_parent);
        return view('admin.productList.edit', compact('category', 'categoryoption'));
    }
    public function update($id, ProductListEditRequest $request)
    {

        ProductListModel::find($id)->update([
            'name' => $request->name,
            'id_parent' => $request->id_parent,
            'status' => $request->filled('status') ? $request->status : false,
            'featured' => $request->filled('featured') ? $request->featured : false,
        ]);
        return redirect()->route('productList.index');

    }
    public function delete($id)
    {

        return $this->deleteModelTrait($id, $this->category);

    }
}
