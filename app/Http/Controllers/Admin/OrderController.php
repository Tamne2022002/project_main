<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\OrderStatusModel;
use App\Models\WarehouseModel;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private $order;
    private $orderdetail;

    public function __construct(OrderModel $order, OrderDetailModel $orderDetail)
    {  
        $this->order = $order;
        $this->orderdetail = $orderDetail;
    }
    public function index(Request $request)
    {
        $search = $request->input('search_keyword');
        $status = OrderStatusModel::get();

        $order = null;
        if ($search) {
            $searchUnicode = '%' . $search . '%';
            $order = $this->order::select('*')
                ->where('order_code', 'LIKE', $searchUnicode)
                ->latest()
                ->paginate(10);
            $order->setPath('order?search_keyword=' . $search);
        } else {
            $order = $this->order::latest()->paginate(15);

        }

        return view('admin.order.index', compact('order', 'status'));
    }
    public function view($id, Request $request)
    {
        $Order = $this->order->find($id);
        $OrderDetail = OrderDetailModel::join('table_product', 'table_product.id', '=', 'table_order_detail.id_product')->where('id_order', $id)->get();
        $status = OrderStatusModel::get();
        try {
            $dataCreate = [
                'status' => $request->status,
            ];
            $this->order->find($id)->update($dataCreate);

            // Update warehouse
            if ($request->status == 6) {
                foreach ($OrderDetail as $k => $v) {
                    $warehouse = WarehouseModel::where('id_parent', $v->id_product)->first();
                    $inventory = $warehouse->quantity + $v->quantity;
                    $warehouse->update(['quantity' => $inventory]);
                }
            }

            return redirect()->route('order.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        }
        return view('admin.order.view', compact('Order', 'OrderDetail', 'status'));

    }
}
