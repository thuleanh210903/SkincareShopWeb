<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\coupon;
use App\Models\category_product;
use App\Models\product;
use App\Models\comment;
use App\Models\comment_content;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductController extends Controller
{
    //
    public function all_product()
    {

        $all_product = product::join('category_product', 'category_product.id_category_product', '=', 'product.id_category_product')->orderBy('product.id_product', 'desc')->get();
       
        return view('admin.product.table-data-product', compact('all_product'));
    }

    public function add_product()
    {
        $cate_pro = category_product::orderby('id_category_product', "asc")->get();

        return view('admin.product.form-add-san-pham')->with(compact('cate_pro'));
    }

    public function save_product(Request $request)
    {
        $data = array();
       
        $data['name_product'] = $request->name_product;
        $data['number'] = $request->number;
        $data['show_product'] = $request->show_product;
        $data['price'] = $request->price;
        $data['id_category_product'] = $request->id_category_product;
        $data['describe_product'] = $request->describe_product;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . time() . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/admin/image/product', $new_image);
            $data['product_image'] = $new_image;
           product::insert($data);
        } else {
            $data['product_image'] = '';
        }
    
        

        
        return redirect('/all-product');
    }

    public function edit_product(Request $request)
    {
        $id_product = $request->id_product;
        $edit_product = product::where('id_product', $id_product)->first();
        $all_category = category_product::get();
        // dd($edit_product);
        return view('admin.product.edit-product')->with(compact('edit_product', 'all_category'));
    }
    public function update_product(Request $request)
    {
        $data = $request->all();
        $product = product::where('id_product', $data['id_product'])->first();

        $product['name_product'] = $data['name_product'];
        $product['number'] = $data['number'];
        $product['price'] = $data['price'];

        $product['show_product'] = $data['show_product'];
        $product['id_category_product'] = $data['id_category_product'];
        $product['describe_product'] = $data['describe_product'];
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/admin/image/product', $new_image);
            $data['product_image'] = $new_image;
            $product['product_image'] = $data['product_image'];
        }
        $product->save();

        return redirect('/all-product');
    }



    public function delete_product($id_product)
    {
        DB::table('product')->where('id_product', $id_product)->delete();
        return redirect('/all-product');
    }


    public function show_product_detail(Request $request, $id_product)
    {


        $detail_product = product::join('category_product', 'category_product.id_category_product', '=', 'product.id_category_product')->where('product.id_product', $id_product)->get();
       
        foreach ($detail_product as $detail){
           $id_category_product =  $detail-> id_category_product;
        }
        $relate_product = product::where('id_category_product',$id_category_product)->whereNotIn('product.id_product',[$id_product])->get();
     
       
        
        
        return view('user.shop.shop_details', compact('detail_product','relate_product'));
    }
    public function searchautoComplete(Request $request)
    {
        
        $query = $request->get('term','');
        $products = product::where('product_name','LIKE','%'.$query.'%')->get();

        $data = [];
        foreach($products as $items){
            $data[] = [
                'value' => $items->product_name,
                'id' => $items->id_product
            ];
        }
        if(count($data)){
            return $data;
        }else{
            return ['value'=>'No resul Found','id'=>''];
        }
    }
    public function show_product($id_product)
    {
        
        $product=product::find($id_product);
        $comment=comment::where('id_product',$product->id_product)->get();
        $content=comment_content::join('comment','comment.id','=','comment_content.idContact')
        ->where('comment.id_product',$product->id_product)
        ->where('idAuthur','!=',1)
        ->get();
        
        // dd($comment);
        return view('admin.comment.table-comment-data',compact('product','content'));
    //comment

    }
    
    
}
