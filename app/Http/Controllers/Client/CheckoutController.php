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

}
