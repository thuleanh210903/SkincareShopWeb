<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order_detail;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\shipping;

class OrderController extends Controller
{
    public function all_order(){
        $all_order = orders::join('tb_user', 'tb_user.user_id', '=', 'orders.user_id')->select('orders.*','tb_user.name')->get();;
      
        return view('admin.order.table-data-order',compact('all_order'));
    }
    public function order_detail($id_order){
    
        $order = orders::where('id_order',$id_order)->first();
      
     
        $all_order_detail = order_detail::where('id_order',$id_order)->get();
     

        $all_shipping = shipping::where('id_shipping',$order->id_shipping)->get();
  

        return view('admin.order.order-detail-data',compact('all_order_detail','all_shipping'));
       
    }

    public function show_edit_order($id_order){
        $edit_order = orders::where('id_order',$id_order)->get();
        return view('admin.order.form-edit-order',compact('edit_order'));
    }
    public function update_order_status(Request $request,$id_order){
        $data = array();
        $data['id_order'] = $request->id_order;
        
        $data['order_status'] = $request-> order_status;
       

        orders::where('id_order', $id_order)->update($data);
        return redirect('/order-table');
    }
    //
}
