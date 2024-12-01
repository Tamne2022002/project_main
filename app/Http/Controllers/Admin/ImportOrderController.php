<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ImportOrderModel;
use App\Models\ImportOrderDetailModel;
use App\Models\ProductModel;
use App\Models\WarehouseModel;
use App\Traits\DeleteModelTrait;

class ImportOrderController extends Controller
{
    use DeleteModelTrait;

    private $ImportOrder;
    private $ImportOrderdetail;
    public function __construct(ImportOrderModel $ImportOrder, ImportOrderDetailModel $ImportOrderdetail)
    {
        $this->ImportOrder = $ImportOrder;
        $this->ImportOrderdetail = $ImportOrderdetail;
    }

    public function index(Request $request)
    {
        $search = $request->input('search_keyword');
        $ImportOrder = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $ImportOrder = $this->ImportOrder::select('*')
                ->where('order_code', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $ImportOrder->setPath('import_order?search_keyword=' . $search);
        } else {
            $ImportOrder = $this->ImportOrder::latest()->paginate(15);
        }
        return view('admin.import_order.index', compact('ImportOrder'));
    }

    public function create()
    {
        $products = ProductModel::select('id', 'name')->get();
        $ImportOrderCode = $this->generateImportOrderCode();
        $TimeCreateImportOrder = $this->getTimeCreateImportOrder();
        return view('admin.import_order.add', compact('ImportOrderCode', 'TimeCreateImportOrder', 'products'));
    }
    public function store(Request $request)
    { 
        try {
            $dataCreate = [
                'order_code' => $request->order_code,
                'import_date' => $request->import_date,
            ];
            $ImportOrder = $this->ImportOrder->create($dataCreate);
            $id_import_order = $ImportOrder->id;
            $details = count($request->id_product);

            for ($i = 0; $i < $details; $i++) {
                $dataCreateImportOrderDetail = [
                    'id_import_order' => $id_import_order,
                    'id_product' => $request->id_product[$i],
                    'quantity' => $request->quantity[$i],
                ];

                $this->ImportOrderdetail->create($dataCreateImportOrderDetail);

                $product = WarehouseModel::where('id_parent', $request->id_product[$i])->first(); 
                $product->quantity = $product->quantity + $request->quantity[$i];
                $product->save();
            }

            return redirect()->route('import_order.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
    }
    public function view($id)
    {
        $ImportOrder = $this->ImportOrder->find($id);
        $ImportOrderdetail = ImportOrderDetailModel::where('id_import_order', $id)->get();

        return view('admin.import_order.view', compact('ImportOrder'));
    }
    public function delete($id)
    {
        $ImportOrderDetail = ImportOrderDetailModel::where('id_import_order', $id)->get();
        $details = count($ImportOrderDetail);
        for ($i = 0; $i < $details; $i++) {
            $product = WarehouseModel::find($ImportOrderDetail[$i]->id_product);
            $product->quantity = $product->quantity - $ImportOrderDetail[$i]->quantity;
        $product->save();
        }
        return $this->deleteModelTrait($id, $this->ImportOrder);

    }
    public function generateImportOrderCode()
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 20);
    }

    public function getTimeCreateImportOrder()
    {
        return now()->setTimezone('Asia/Ho_Chi_Minh');
    }

    public function getProductId(Request $request)
    {
        $productIds = $request->query('productId');

        if (is_array($productIds)) {
            $products = ProductModel::whereIn('id', $productIds)->get();
        }
        return response()->json(['products' => $products]);
    }
}
