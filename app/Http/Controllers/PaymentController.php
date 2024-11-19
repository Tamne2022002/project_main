<?php

namespace App\Http\Controllers;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\WarehouseModel; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    { 
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
 
        if (count(session('cart')) == 0) {
            return redirect()->route('user.cart');
        }

        $user = Auth::guard('member')->user(); 
 
    $selectedProductIds = $request->input('selected_products', []); 

    if (!empty($selectedProductIds)) {
        $cart = session('cart', []);
        $selectedProducts = array_filter($cart, function ($key) use ($selectedProductIds) {
            return in_array($key, $selectedProductIds);
        }, ARRAY_FILTER_USE_KEY);
        session(['selected_products' => $selectedProducts]);
    }
 
    $products = session('selected_products', session('cart', []));

    // Tính tổng tiền
    $total = array_reduce($products, function ($carry, $item) {
        $price = $item['sale_price'] ?? $item['regular_price'];
        return $carry + ($price * $item['quantity']);
    }, 0);

    return view('client.order.payment', compact('user', 'products', 'total'));
    }

    public function combination(Request $request) {
         
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
 
        $request->merge([
            'fullname_vnpay' => $request->fullname_vnpay,
            'address_vnpay' => $request->address_vnpay,
            'phone_vnpay' => $request->phone_vnpay,
            'note_vnpay' => $request->note,
        ]);

        $total = 30000;

        $order_code = $this->generateOrderCode();

        /*  Thanh toán vnpay */
        if ($request['type'] === 'payment_vnpay') {

            $orderInfo = new OrderModel();
            foreach (session('cart') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            }
    
            //$member = Member::where('id', Auth::guard('member')->user()->id);
            $orderInfo->order_code = $order_code;
            $orderInfo->id_member = Auth::guard('member')->user()->id;
            $orderInfo->fullname = $request->fullname_vnpay;
            $orderInfo->phone = $request->phone_vnpay;
            $orderInfo->address = $request->address_vnpay;
            $orderInfo->note = $request->note_vnpay;
            $orderInfo->total_price = $total;
            $orderInfo->status = 1;
            $orderInfo->save();

            foreach (session('cart') as $id => $details) {
                $orderDetail = new OrderDetailModel;
    
                $orderDetail->order_id = $orderInfo->id;
                $orderDetail->product_id = $details['id_product'];
                $orderDetail->quantity = $details['quantity'];
                $orderDetail->regular_price = $details['regular_price'];
                $orderDetail->sale_price = $details['sale_price'];
                $orderDetail->save();
    
                $warehouse = WarehouseModel::where('id_parent', $details['id_product'])->first();
                $warehouse->quantity -= $details['quantity'];
                $warehouse->save();
            }

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            //$vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
            //$vnp_Returnurl = "http://127.0.0.1:8000/vnpay_return";
            $vnp_Returnurl = route('vnpay.return');
            $vnp_TmnCode = "X3G144O6"; //Mã website tại VNPAY
            $vnp_HashSecret = "BCYUDKCSUWNQTKGATYPCLZAGNRXFYUNF"; //Chuỗi bí mật

            //$vnp_TxnRef = "111001"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            //$vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán hoá đơn";
            $vnp_OrderType = "Bookstore";
            $vnp_Amount = $total * 100;
            $vnp_Locale = "vi-VN";
            $vnp_BankCode = "";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => now()->format('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $order_code,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url,
            );
            if (isset($_POST['type'])) {
                header('Location: ' . $vnp_Url);
                die();
                //dd('Thanh toan thanh cong', $vnp_Url);
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
        }
        /* Thanh toán QR */
        else if($request->input('type') === 'payment') {
            $orderInfo = new OrderModel;
            foreach (session('cart') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            }
    
            //$member = Member::where('id', Auth::guard('member')->user()->id);
            $orderInfo->order_code = $order_code;
            $orderInfo->id_member = Auth::guard('member')->user()->id;
            $orderInfo->fullname = $request->fullname_vnpay;
            $orderInfo->phone = $request->phone_vnpay;
            $orderInfo->address = $request->address_vnpay;
            $orderInfo->note = $request->note_vnpay;
            $orderInfo->total_price = $total;
            $orderInfo->status = 1;
            $orderInfo->save();
    
            foreach (session('cart') as $id => $details) {
                $orderDetail = new OrderDetailModel;
    
                $orderDetail->order_id = $orderInfo->id;
                $orderDetail->product_id = $details['id_product'];
                $orderDetail->quantity = $details['quantity'];
                $orderDetail->regular_price = $details['regular_price'];
                $orderDetail->sale_price = $details['sale_price'];
                $orderDetail->save();
    
                $warehouse = WarehouseModel::where('id_parent', $details['id_product'])->first();
                $warehouse->quantity -= $details['quantity'];
                $warehouse->save();
            }

            foreach (session('cart') as $id => $details) {
                $warehouse = WarehouseModel::where('id_parent', $details['id_product'])->first();
                $warehouse->quantity -= $details['quantity'];
            }

            session()->forget('cart');
            return redirect()->route('user.cart')->with('notify', [
                'status' => 'success',
                'message' => 'Thanh toán thành công'
            ]);
            // thanh toán vietqr
        } 
        /* Thanh toán khi nhận hàng */
        else {
            $orderInfo = new OrderModel();

            foreach (session('selected_products') as $id => $details) {
                $warehouse = WarehouseModel::where('id_parent', $details['id_product'])->first();
                $slt = $warehouse->quantity;
                if( $slt > 0){
                    $slt -= $details['quantity'];
                    if( $slt > 0 ){
                        $warehouse->quantity = $slt;
                    } else {
                        return redirect()->route('user.cart')->with('notify', [
                            'status' => 'error',
                            'message' => 'Số lượng hàng không đủ mong bạn thông cảm.'
                        ]);
                    }
                } else {
                    return redirect()->route('user.cart')->with('notify', [
                        'status' => 'error',
                        'message' => 'Số lượng hàng không đủ mong bạn thông cảm.'
                    ]);
                }
            }

            foreach (session('selected_products') as $id => $details) {
                $total += ($details['sale_price'] ? $details['sale_price'] : $details['regular_price']) * $details['quantity'];
            } 
            //$member = Member::where('id', Auth::guard('member')->user()->id);
            $orderInfo->order_code = $order_code;
            $orderInfo->id_member = Auth::guard('member')->user()->id;
            $orderInfo->fullname = $request->fullname_vnpay;
            $orderInfo->phone = $request->phone_vnpay;
            $orderInfo->address = $request->address_vnpay;
            $orderInfo->note = $request->note_vnpay;
            $orderInfo->total_price = $total;
            $orderInfo->status = 1; 
            $orderInfo->save();
    
            foreach (session('selected_products') as $id => $details) {
                $orderDetail = new OrderDetailModel;
    
                $orderDetail->id_order = $orderInfo->id;
                $orderDetail->id_product = $details['id_product'];
                $orderDetail->quantity = $details['quantity'];
                $orderDetail->regular_price = $details['regular_price'];
                $orderDetail->sale_price = $details['sale_price'] ?? 0;
                $orderDetail->save();
    
                $warehouse = WarehouseModel::where('id_parent', $details['id_product'])->first();
                $warehouse->quantity -= $details['quantity'];
                $warehouse->save();
            }
 
            OrderModel::where('order_code', $order_code)->update([
                'status' => 2,
            ]);

            $array1 = session('selected_products', []);
            $array2 = session('cart', []); 

            foreach ($array1 as $key => $value) {
                if (array_key_exists($key, $array2)) { 
                    unset($array2[$key]);
                }
            };
            session()->put('cart', $array2);
                
            session()->forget('selected_products'); 
            return redirect()->route('user.cart')->with('notify', [
                'status' => 'success',
                'message' => 'Thanh toán thành công'
            ]);
        }

        //session()->forget('cart');
        return redirect()->route('user.cart')->with('notify', [
            'status' => 'error',
            'message' => 'Thanh toán không thành công'
        ]);
    }

    public function return (Request $request)
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('user.login');
        }
        if ($request->vnp_ResponseCode == "00") {
            //dd($request->all());
            //dd($request->all(), session('cart'));
            OrderModel::where('order_code', $request->vnp_TxnRef)->update([
                'status' => 2,
            ]); 

            foreach (session('cart') as $id => $details) {
                $warehouse = WarehouseModel::where('id_parent', $details['id_product'])->first();
                $warehouse->quantity -= $details['quantity'];
            }
            session()->forget('cart');
            return redirect()->route('user.cart')->with('notify', [
                'status' => 'success',
                'message' => 'Thanh toán thành công'
            ]);
            //dd('Đã thanh toán phí dịch vụ');
        }

        $hdb = OrderModel::where('order_code', $request->vnp_TxnRef)->get();

        $cthdb = OrderDetailModel::where('id_order', $hdb->id)->get();

        foreach($cthdb as $v) {
            $v->delete();
        }

        $hdb->delete();

        //session()->forget('url_prev');
        //return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
        return redirect()->route('user.cart')->with('notify', [
            'status' => 'error',
            'message' => 'Thanh toán không thành công'
        ]);
    }

    public function generateOrderCode()
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20 / strlen($x)))), 1, 20);
    }
}