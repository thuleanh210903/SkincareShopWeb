<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\coupon;
use App\Models\category_product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\product;
use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use function PHPUnit\Framework\returnSelf;

class CouponController extends Controller
{
    //
    public function all_coupon()
    {
        $all_coupon = coupon::all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
       
       
        return view('admin.coupon.table-data-banned', ['all_category_product', $all_coupon],['today',$today]);
    }

    public function add_coupon()
    {
        return view('admin.coupon.form-add-coupon');
    }

    public function save_coupon(Request $request)
    {
        $data = array();
        $request->validate(
            [
                'coupon_code' => "unique:coupon",
            ],
            [
                'unique' => "Ma giam gia nay da ton tai",
            ]

        );


        $data['coupon_name'] = $request->coupon_name;
        $data['coupon_number'] = $request->coupon_number;
        $data['coupon_time'] = $request->coupon_time;
        $data['date_start'] = $request->date_start;
        $data['date_end'] = $request->date_end;
        $data['coupon_condition'] = $request->coupon_condition;
        $data['coupon_code'] = $request->coupon_code;
        // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
     
        // if($today> $data['date_end']){
        //    $result = 'Đã hết hạn';
        // }else{
        //     $result = 'Chưa hết hạn';
        // }
      
        coupon::insert($data);
        return redirect('/all-coupon');
    }

    // public function edit_coupon($id_coupon)
    // {
    //     $edit_coupon = coupon::where('id_coupon', $id_coupon)->first();
    //     return view('admin.coupon.form-edit-coupon', compact('edit_coupon'));
    // }

    public function edit_coupon(Request $request)
    {
        $id_coupon= $request->id_coupon;
        $edit_coupon = coupon::where('id_coupon', $id_coupon)->first();

        // dd($edit_product);
        return view('admin.coupon.form-edit-coupon')->with(compact('edit_coupon'));
    }

    
    // public function update_coupon(Request $request, $id_coupon)
    // {
    //     $data = array();
    //     $data['coupon_name'] = $request->coupon_name;
    //     $data['coupon_number'] = $request->coupon_number;
    //     $data['coupon_time'] = $request->coupon_time;
    //     $data['coupon_condition'] = $request->coupon_condition;
    //     $data['coupon_code'] = $request->coupon_code;
        

    //     coupon::where('id_coupon', $id_coupon)->update($data);
    //     return redirect('/all-coupon');
    // }



    public function update_coupon(Request $request){
        $data = $request->all();
        $coupon = coupon::where('id_coupon', $data['id_coupon'])->first();

        $coupon['coupon_name'] = $data['coupon_name'];
        $coupon['coupon_number'] = $data['coupon_number'];
        $coupon['coupon_time'] = $data['coupon_time'];

        $coupon['coupon_condition'] = $data['coupon_condition'];
       
        $coupon->save();
        return redirect('/all-coupon');
    }


    public function delete_coupon($id_coupon)
    {
        coupon::where('id_coupon', $id_coupon)->delete();
        return redirect('/all-coupon');
    }

   

    //end admin
    
}
