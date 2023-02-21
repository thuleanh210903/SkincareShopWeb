<?php

namespace App\Http\Controllers\client;

use App\Models\coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\category_product;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Carbon;

class CartController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_cart(Request $request)
    {
        $product_id = $request->idproduct_hidden;
        $quantity = $request->qty;
        $product_info = product::where('id_product', $product_id)->first();

        $data['id'] = $product_info->id_product;

        $data['qty'] = $quantity;
        $data['name'] = $product_info->name_product;
        $data['price'] = $product_info->price;
        $data['weight'] = 550;
        $data['options']['image'] = $product_info->product_image;

        Cart::add($data);

        return redirect('/show-cart');
    }
    public function show_cart()
    {
        $cartItem = Cart::content();
        return view('user.payment.shopping_cart', compact('cartItem'));
    }
    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $coupon = coupon::where('coupon_code', $data['coupon'])->where('date_end', '>=', $today)->first();

        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = session()->get('coupon');

                if ($coupon_session == true) {
                    $available = 0;
                    if ($available == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_number' => $coupon->coupon_number,
                            'coupon_condition' => $coupon->coupon_condition,
                        );
                        session()->put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_number' => $coupon->coupon_number,
                        'coupon_condition' => $coupon->coupon_condition,
                    );
                    session()->put('coupon', $cou);
                }
            }
            session()->save();
            return redirect('/cart');
        } else {
            return redirect('/show-cart');
        }
    }
    public function off_coupon()
    {
        $coupon = session()->get('coupon');
        if ($coupon == true) {
            session()->forget('coupon');
        }
        return redirect()->back();
    }
}
