<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Components\Recusive;
use App\Http\Controllers\Admin\PublisherController;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    use StorageImageTrait, DeleteModelTrait; 
    public function __construct(ProductModel $product)
    { 
        $this->product = $product; 
    }
    public function index(Request $request)
    {
        $categories = ProductListModel::select('*')->get();
        
        $search = $request->input('search_keyword');
        $products = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $products = ProductModel::select('id', 'name', 'id_list', 'photo_name', 'photo_path')
            ->where('name', 'LIKE', $searchUnicode)
            ->latest()
            ->paginate(15);
            $products->setPath('product?search_keyword=' . $search);
        } else {
            $products = ProductModel::latest()->orderBy('id','asc')->paginate(10); 
 
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
                $product = ProductModel::find($warehouseItem->id);
                $warehouseItem->product_name = $product ? $product->name : 'Không tìm thấy sản phẩm';
                $warehouseItem->photo_path = $product ? $product->photo_path : 'Ảnh không có sẵn';
                $warehousedata = WarehouseModel::find($warehouseItem->id);

                if ($warehousedata) {
                    $warehouseItem->quantity = $warehousedata->quantity;

                    // Lấy id_list từ bảng Product
                    $id_list = $product ? $product->id_list : null;
                    $warehouseItem->id_parent = $id_list;

                    if ($id_list) {
                        // Tìm tên danh mục dựa trên id_list từ bảng Category
                        $productList = ProductListModel::find($id_list);
                        $warehouseItem->category_name = $productList ? $productList->name : 'Không tìm thấy danh mục';
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
        $warehouse = WareHouseModel::latest()->paginate(15); 
            foreach ($warehouse as $warehouseItem) {
                $product = ProductModel::find($warehouseItem->id_parent);
                $warehouseItem->product_name = $product ? $product->name : 'Không tìm thấy sản phẩm';
                $warehouseItem->photo_path = $product ? $product->photo_path : 'Ảnh không có sẵn';
                $warehouseItem->photo_name = $product ? $product->photo_name : 'Ảnh không có sẵn';

                // Lấy id_list từ bảng Product
                $id_list = $product ? $product->id_list : null;
                $warehouseItem->id_parent = $id_list;

                if ($id_list) {
                    // Tìm tên danh mục dựa trên category_id từ bảng Category
                    $category = ProductListModel::find($id_list);
                    $warehouseItem->category_name = $category ? $category->name : 'Không tìm thấy danh mục';
                } else {
                    $warehouseItem->category_name = 'Không tìm thấy danh mục';
                }
            }
        } 

        return view('admin.warehouse.index', compact('warehouse','categories'));
    }

    public function create(PublisherController $publisherController)
    {
        $htmlOption = $this->getCategory($parentId = '');
        $publishers = $publisherController->getPublishers();
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
                'id_list' => $request->id_list ?? null,
                'desc' => $request->desc ?? null,
                'content' => $request->content ?? null,
                'regular_price' => $request->regular_price ?? null,
                'sale_price' => $request->sale_price ?? null,
                'discount' => $request->discount ?? null,
                'id_publisher' => $request->id_publisher ?? null,
                'author' => $request->author ?? null,
                'code' => $request->code ?? null,
                'publishing_year' => $request->publishing_year ?? '',
                'status' => $request->filled('status') ? $request->status : false,
                'featured' => $request->filled('featured') ? $request->featured : false,
            ]; 
            $dataUploadProductImage = $this->storagetrait($request, 'photo_path', 'product'); 
            if (!empty($dataUploadProductImage)) {
                $dataProductCreate['photo_name'] = $dataUploadProductImage['file_name'];
                $dataProductCreate['photo_path'] = $dataUploadProductImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
 

            $product_id = $product->id;
            $dataWarehouseCreate = [
                'id_parent' => $product_id,
                'quantity' => 0,
                'status' => true,
            ]; 
            WarehouseModel::create($dataWarehouseCreate);
            // /* Sub img */
            if ($request->hasFile('photo_path_multi')) {
                foreach ($request->photo_path_multi as $fileItem) {
                    $datagallery = $this->storagetraitmultiple($fileItem, 'product');
                    $product->images()->create([
                        'id_parent' => $product->id,
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
        
        $product = ProductModel::find($id);
        $publishers = PublisherModel::all();
        $htmlOption = $this->getCategory($product['id_list']);
        return view('admin.product.edit', compact('htmlOption', 'product', 'publishers'));
    }

    public function update(ProductEditRequest $request, $id)
    {  
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'id_list' => $request->id_list,
                'name' => $request->name,
                'desc' => $request->desc,
                'content' => $request->content,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'discount' => $request->discount,
                'id_publisher' => $request->id_publisher,
                'author' => $request->author,
                'code' => $request->code,
                'publishing_year' => $request->publishing_year,
                'status' => $request->filled('status') ? $request->status : false,
                'featured' => $request->filled('featured') ? $request->featured : false,
            ];
            $dataUploadProductImage = $this->storagetrait($request, 'photo_path', 'product');
            if (!empty($dataUploadProductImage)) {

                $dataProductUpdate['photo_name'] = $dataUploadProductImage['file_name'];
                $dataProductUpdate['photo_path'] = $dataUploadProductImage['file_path'];
            }

            ProductModel::find($id)->update($dataProductUpdate);
            $product = ProductModel::find($id);
            /* Sub img */
            if ($request->hasFile('photo_path')) {
                $this->gallery->where('product_id', $id)->delete();
                foreach ($request->photo_path as $fileItem) {
                    $datagallery = $this->storagetraitmultiple($fileItem, 'product');
                    $product->images()->create([
                        'id_parent' => $product->id,
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
        WarehouseModel::where('id_parent', $id)->delete();
        return $this->deleteModelTrait($id, $this->product);
    }
    public function getCategoryId(Request $request)
    {
        $categoryIds = $request->query('categoryId'); 
        if (is_array($categoryIds)) {
            $products = ProductModel::whereIn('id_list', $categoryIds)->get(); 
        } else {
            $products = ProductModel::with('table_product_list')->get();
        }
        return response()->json(['products' => $products]);
    }
    public function getCategoryIdWarehouse(Request $request)
    {
        
        $categoryIds = $request->query('categoryId');
        
        if (is_array($categoryIds)) {
            $products = ProductModel::whereIn('category_id', $categoryIds)->with('category')->get();
        } else {
            $products = ProductModel::with('category')->get();
        }
        foreach ($products as $key => $product) {
            $products[$key]['quantity'] = Warehouse::where('product_id', $product->id)->pluck('quantity');
        }
        return response()->json(['products' => $products]);
    }

}
