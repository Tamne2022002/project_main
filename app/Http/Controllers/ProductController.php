<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Controllers\PublisherController;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest; 
use App\Models\ProductListModel;
use App\Models\ProductModel; 
use App\Models\GalleryModel;
use App\Models\PublisherModel;
use App\Models\WarehouseModel;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use function Laravel\Prompts\error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    use StorageImageTrait, DeleteModelTrait; 
    public function index(Request $request)
    {
        $categories = ProductListModel::select('*')->get();

        $search = $request->input('search_keyword');
        $products = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $products = ProductModel::select('id', 'name', 'category_id','product_photo_path')
                ->where('name', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(15);
            $products->setPath('product?search_keyword=' . $search);
        } else {
            $products = ProductModel::latest()->paginate(15);
        }
        return view('admin.product.index', compact('products', 'categories'));

    }
    /* Warehouse */

    public function warehouse(Request $request)
    {
        $categories = ProductListModel::select('*')->get();

        $search = $request->input('search_keyword');
        $warehouse = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $warehouse = ProductModel::select('*')
                ->where('name', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(15);

            foreach ($warehouse as $warehouseItem) {
                $product = Product::find($warehouseItem->id);
                $warehouseItem->product_name = $product ? $product->name : 'Không tìm thấy sản phẩm';
                $warehouseItem->product_photo_path = $product ? $product->product_photo_path : 'Ảnh không có sẵn';
                $warehousedata = Warehouse::find($warehouseItem->id);

                if ($warehousedata) {
                    $warehouseItem->quantity = $warehousedata->quantity;

                    // Lấy category_id từ bảng Product
                    $category_id = $product ? $product->category_id : null;
                    $warehouseItem->category_id = $category_id;

                    if ($category_id) {
                        // Tìm tên danh mục dựa trên category_id từ bảng Category
                        $category = Category::find($category_id);
                        $warehouseItem->category_name = $category ? $category->name : 'Không tìm thấy danh mục';
                    } else {
                        $warehouseItem->category_name = 'Không tìm thấy danh mục';
                    }
                } else {
                    $warehouseItem->quantity = 'Không tìm thấy số lượng';
                    $warehouseItem->category_id = 'Không tìm thấy danh mục';
                    $warehouseItem->category_name = 'Không tìm thấy danh mục';
                }
            }

        $warehouse->setPath('warehouse?search_keyword=' . $search);
        } else {
        $warehouse = $this->warehouse->latest()->paginate(15);
            foreach ($warehouse as $warehouseItem) {
                $product = Product::find($warehouseItem->product_id);
                $warehouseItem->product_name = $product ? $product->name : 'Không tìm thấy sản phẩm';
                $warehouseItem->product_photo_path = $product ? $product->product_photo_path : 'Ảnh không có sẵn';

                // Lấy category_id từ bảng Product
                $category_id = $product ? $product->category_id : null;
                $warehouseItem->category_id = $category_id;

                if ($category_id) {
                    // Tìm tên danh mục dựa trên category_id từ bảng Category
                    $category = ProductListModel::find($category_id);
                    $warehouseItem->category_name = $category ? $category->name : 'Không tìm thấy danh mục';
                } else {
                    $warehouseItem->category_name = 'Không tìm thấy danh mục';
                }
            }
        }

        return view('admin.warehouse.index', compact('warehouse','categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        $publishers = $this->publisherController->getPublishers();
        return view('admin.product.add', compact('htmlOption', 'publishers'));
    }
    public function getCategory($parentId)
    {
        $data = ProductListModel::select('*')->get();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'discount' => $request->discount,
                'publisher_id' => $request->publisher_id,
                'author' => $request->author,
                'code' => $request->code,
                'publishing_year' => $request->publishing_year,
                'status' => $request->filled('status') ? $request->status : false,
                'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
                'category_id' => $request->category_id,
            ];
            $dataUploadProductImage = $this->storagetrait($request, 'product_photo_path', 'product');
            if (!empty($dataUploadProductImage)) {
                $dataProductCreate['product_photo_name'] = $dataUploadProductImage['file_name'];
                $dataProductCreate['product_photo_path'] = $dataUploadProductImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            $product_id = $product->id;
            $dataWarehouseCreate = [
                'product_id' => $product_id,
                'quantity' => 0,
                'status' => true,
            ];
            $this->warehouse->create($dataWarehouseCreate);
            /* Sub img */
            if ($request->hasFile('photo_path')) {
                foreach ($request->photo_path as $fileItem) {
                    $datagallery = $this->storagetraitmultiple($fileItem, 'product');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'photo_path' => $datagallery['file_path'],
                        'photo_name' => $datagallery['file_name'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $publishers = Publisher::all();
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product', 'publishers'));
    }

    public function update(ProductEditRequest $request, $id)
    {

        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'discount' => $request->discount,
                'publisher_id' => $request->publisher_id,
                'author' => $request->author,
                'code' => $request->code,
                'publishing_year' => $request->publishing_year,
                'status' => $request->filled('status') ? $request->status : false,
                'outstanding' => $request->filled('outstanding') ? $request->outstanding : false,
                'category_id' => $request->category_id,
            ];
            $dataUploadProductImage = $this->storagetrait($request, 'product_photo_path', 'product');
            if (!empty($dataUploadProductImage)) {

                $dataProductUpdate['product_photo_name'] = $dataUploadProductImage['file_name'];
                $dataProductUpdate['product_photo_path'] = $dataUploadProductImage['file_path'];
            }

            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            /* Sub img */
            if ($request->hasFile('photo_path')) {
                $this->gallery->where('product_id', $id)->delete();
                foreach ($request->photo_path as $fileItem) {
                    $datagallery = $this->storagetraitmultiple($fileItem, 'product');
                    $product->images()->create([
                        'product_id' => $product->id,
                        'photo_path' => $datagallery['file_path'],
                        'photo_name' => $datagallery['file_name'],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        Warehouse::where('product_id', $id)->delete();
        return $this->deleteModelTrait($id, $this->product);

    }
    public function getCategoryId(Request $request)
    {
        $categoryIds = $request->query('categoryId');
        if (is_array($categoryIds)) {
            $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();
        } else {
            $products = Product::with('category')->get();
        }
        return response()->json(['products' => $products]);
    }
    public function getCategoryIdWarehouse(Request $request)
    {
        
        $categoryIds = $request->query('categoryId');
        
        if (is_array($categoryIds)) {
            $products = Product::whereIn('category_id', $categoryIds)->with('category')->get();
        } else {
            $products = Product::with('category')->get();
        }
        foreach ($products as $key => $product) {
            $products[$key]['quantity'] = Warehouse::where('product_id', $product->id)->pluck('quantity');
        }
        return response()->json(['products' => $products]);
    }

}
