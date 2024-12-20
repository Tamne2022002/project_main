<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductModel;
use App\Models\PhotoModel;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use DB;

class CCartController extends Controller
{
    public function index()
    {
        if (Auth::guard('member')->user()) {
            $user = Auth::guard('member')->user(); 
        } else {
            $user = '';
        }
        $banner =  PhotoModel::select('name', 'desc', 'photo_path')->where('type', 'banner')->get();
        return view('client.order.cart', compact('user','banner'));
    }

    //thêm giỏ hàng từ index
    public function add_index($id = null, $quantity)
    {

        if (!$id || !$quantity || $quantity < 1) {
            return response()->json(['message' => 'Dữ liệu không hợp lệ!'], 400);
        }
    
        $product = ProductModel::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại!'], 404);
        }
    
        $qty = WarehouseModel::where('id_parent', $id)->value('quantity');
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id_product' => $id,
                'name' => $product->name,
                'regular_price' => $product->regular_price,
                'sale_price' => $product->sale_price,
                'photo_path' => $product->photo_path,
                'quantity' => $quantity,
                'product_qty' => $qty,
            ];
        }
    
        session()->put('cart', $cart);
    
        return response()->json(['message' => 'Thêm giỏ hàng thành công!', 'cart' => $cart], 200);
    }

    public function changeQuantity($id, $method)
    {
        $cart = session()->get('cart');
        $total = 0;

        if ($method === 'plus') {
            $cart[$id]['quantity']++;
        } elseif ($method === 'minus') {
            $cart[$id]['quantity']--;
        } else {
            $cart[$id]['quantity'] = $method;
        }

        $updatePrice = ($cart[$id]['sale_price'] ? $cart[$id]['sale_price'] : $cart[$id]['regular_price']) * $cart[$id]['quantity'];
        session()->put('cart', $cart);
        foreach (session('cart') as $id => $details) {
            $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
        }

        return response()->json(['is_passed' => 'true', 'update_price' => $updatePrice, 'total' => $total]);
    }

    public function delete($id)
    {
        $total = 0;
        if ($id) {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            foreach (session('cart') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            }
        }

        $isEmpty = session()->get('cart') && count(session()->get('cart')) == 0;

        return response()->json(['is_passed' => 'true', 'total' => $total, 'is_empty' => $isEmpty]);
    }
    public function getDistricts(Request $request)
    {
        $provinceId = $request->input('province_id');
        $districts = DB::table('table_districts')
                    ->where('ProvinceId', $provinceId)
                    ->get(); 

        return response()->json(['districts' => $districts]);
    }

    public function getWards(Request $request)
    {
        $districtId = $request->input('district_id'); 
        $wards = DB::table('table_wards')
        ->where('DistrictId', $districtId)
        ->get(); 

        return response()->json(['wards' => $wards]);
    }
}
