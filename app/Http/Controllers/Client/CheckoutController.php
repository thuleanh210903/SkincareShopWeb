<?php

namespace App\Http\Controllers\Client;

use App\Models\order_detail;
use Illuminate\Support\Facades\Cookie;
use App\Models\orders;
use App\Models\User;
use App\Models\shipping;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\payment;
use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use SessionUpdateTimestampHandlerInterface;

class CheckoutController extends Client
{
    //
    public function checkout()
    {
        if (Auth::check()) {

            return view('user.payment.checkout');
        } else {
            return redirect('/login');
        }
    }

    public function save_shipping(Request $request)
    {
        //shipping
        $user_id = Auth::user()->user_id;
        $user = User::find($user_id);
        $user->name = $request->shipping_name;
        $user->address = $request->shipping_address;
        $user->numberphone = $request->shipping_phone;
        $data_shipping = array();
        $data_shipping['shipping_name'] = $user->name;
        $data_shipping['shipping_address'] = $user->address;
        $data_shipping['shipping_phone'] = $user->numberphone;
        $data_shipping['shipping_note'] = $request->shipping_note;
        $id_shipping = shipping::insertGetId($data_shipping);
        session()->put('id_shipping', $id_shipping);



        $user_id = Auth::user()->user_id;
        $order = new orders();
        $order->user_id = $user_id;
        $order->order_status = '0';
        $order->order_total = (float)Cart::total();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today_order = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order->order_date = $today_order;
        $order->id_shipping = session()->get('id_shipping');
        $order->save();
        $last_order = $order->id_order;
        session()->put('id_order',$last_order);

        $cartItem = Cart::content();

        if ($cartItem) {
            foreach ($cartItem as $item_data) {
                $order_detail['id_order'] = $last_order;
                $order_detail['id_product'] =  $item_data->id;
                $order_detail['product_name'] = $item_data->name;
                $order_detail['price'] = $item_data->price;
                $order_detail['quantity'] = $item_data->qty;
                order_detail::insert($order_detail);

            }
        }
        
        return redirect('/save-checkout');
    }

    public function save_checkout() {
        //order
        $id_order = session()->get('id_order');
        
        $order_user = orders::where('id_order',$id_order)->get();
        $id_shipping= session()->get('id_shipping');
        $shipping = shipping::where('id_shipping',$id_shipping);
    

        return view('user.payment.payment',compact('order_user','shipping'));
    }
    public function payment_option(Request $request){
        $payment_method = $request->payment_method;
        
        if($payment_method == 1){
            return view('user.index');
        }
        
    }



    public function vnpay(Request $request)
    {
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "WQX9IF7Z"; //Mã website tại VNPAY 
        $vnp_HashSecret = "OHNBVLQTMRIJSJKBTWSUVRABIDNPOCPP"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://doancs2.test/check-out";
        $vnp_TxnRef = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);

    }
}
