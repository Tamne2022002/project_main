<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductListModel;
use App\Models\WarehouseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CProductController extends Controller
{
    public function index()
    {   
        $category_first = ProductListModel::with('children')->where('featured', 1)->where('status', 1)->whereNull('deleted_at')->where('id_parent', 0)->get();
        $productInternal = ProductModel::select('id', 'name', 'photo_path', 'regular_price', 'sale_price', 'discount')->where('status', 1)->whereNull('deleted_at')->latest()->paginate(20);
        $pageName = 'Sản phẩm';

        return view('client.product.index', compact('productInternal', 'pageName','category_first'));
    }

    public function detail($id)
    {

        $productDetail = ProductModel::find($id);
        $pageName = $productDetail->name;
        $qty = WarehouseModel::where('id_parent', $id)->value('quantity');
        $cart = session()->get('cart', []);
        $cqtyincart = isset($cart[$id]['quantity']) ? $cart[$id]['quantity'] : 0;

        //dd($qty);

        return view('client.product.detail', compact('productDetail', 'pageName', 'qty', 'cqtyincart'));
    }

    public function add(Request $request, $id )
    {
        //dd($request->all());

        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
        $product = ProductModel::where('id', $id)->first();
        $cart = session()->get('cart', []);
        $quantityToAdd = $request->input('qty-pro');
        $wqty = WarehouseModel::where('id_parent', $id)->value('quantity');

        $currentQuantityInCart = isset($cart[$id]['quantity']) ? $cart[$id]['quantity'] : 0;
        $totalQuantity = $currentQuantityInCart + $quantityToAdd;

        if ($totalQuantity > $wqty) {
            return response()->json(['error' => 'Số lượng sản phẩm trong giỏ hàng vượt quá số lượng tồn kho'], 400);
        }

        if (isset($cart[$id])) {
            //$cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id]['id_product'] = $id;
            $cart[$id]['name'] = $product->name;
            $cart[$id]['regular_price'] = $product->regular_price;
            $cart[$id]['sale_price'] = $product->sale_price;
            $cart[$id]['photo_path'] = $product->photo_path;
            //$cart[$id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
    }
    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (!empty($query)) {
            $products = ProductModel::where('name', 'like', "%$query%")
                ->orWhere('desc', 'like', "%$query%")
                ->limit(10)
                ->get();

            return response()->json($products);
            dd($product);
        }

        return response()->json([]);
    }
}
