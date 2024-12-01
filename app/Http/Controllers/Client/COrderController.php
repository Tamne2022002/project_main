<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class COrderController extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->user()) {
            // $allrate = Rate::all();
            $user = Auth::guard('member')->user();
            $hdb = OrderModel::where('id_member', $user->id)->orderBy('created_at', 'desc')->get();

            //dd($hdb, $allrate);
            return view('client.order.order', compact('user', 'hdb'));
        }
        return redirect()->route('login');
    }

    public function detail($id)
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user();
            $hdb = OrderModel::where('id', $id)->get();
            //$cthdb = DB::table('sale_invoice_details')->join('products', 'sale_invoice_details.product_id', '=', 'products.id')->get();
            $cthdb = OrderDetailModel::join('table_product', 'table_product.id', '=', 'table_order_detail.id_product')->where('id_order', $id)->get();
            //$cthdb = DB::table('order_details')->join('products', 'order_details.product_id', '=', 'products.id')->get();
            return view('client.order.order_detail', compact('user', 'hdb', 'cthdb'));
            //dd($cthdb);
        }
        return redirect()->route('login');
    }

    public function cancelOrder(Request $request)
    {
        $orderId = $request->input('orderId');
 
        $order = OrderModel::where('order_code', $orderId)->first();

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Đơn hàng không tồn tại.'], 404);
        }

        OrderModel::where('order_code', $orderId)->update(['status' => '6', 'updated_at' => now()]);

        return response()->json(['success' => true, 'message' => 'Đơn hàng đã được hủy thành công.']);
    }

}
