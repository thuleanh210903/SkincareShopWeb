<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\category_product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\product;
use Illuminate\Pagination\Paginator;

use function PHPUnit\Framework\returnSelf;

class CategoryProduct extends Controller
{
    //
    public function all_category_product()
    {
        $all_category_product = category_product::all();
        return view('admin.product.danh-muc-san-pham', ['all_category_product', $all_category_product]);
    }

    public function add_category_product()
    {
        return view('admin.product.form-add-danh-muc-sp');
    }

    public function save_category_product(Request $request)
    {
        $data = array();
        $request->validate(
            [
                'name_category_product' => "unique:category_product",
            ],
            [
                'unique' => "Danh muc nay da ton tai",
            ]

        );


        $data['name_category_product'] = $request->name_category_product;
        $data['show'] = $request->show;
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . time() . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/admin/image/cate', $new_image);
            $data['image'] = $new_image;
        
        } else {
            $data['image'] = '';
        }

        category_product::insert($data);
        return redirect('/all-category-product');
    }

    public function edit_category_product($id_category_product)
    {
        $edit_category_product = category_product::where('id_category_product', $id_category_product)->get();
        return view('admin.product.edit-category-product', compact('edit_category_product'));
    }
    public function update_category_product(Request $request, $id_category_product)
    {
        $data = array();
        $data['name_category_product'] = $request->name_category_product;
        $data['show'] = $request->show;

        DB::table('category_product')->where('id_category_product', $id_category_product)->update($data);
        return redirect('/all-category-product');
    }



    public function delete_category_product($id_category_product)
    {
        DB::table('category_product')->where('id_category_product', $id_category_product)->delete();
        return redirect('/all-category-product');
    }


    //end admin
    public function show_category()
    {

        $category_product = category_product::orderby('id_category_product', "asc")->where('show', '1')->get();

        return view('user.shop.shop')->with('category_product', $category_product);
    }
    public function show_product($id_category_product,  Request $request)
    {
        $category_product_by_id = product::join('category_product', 'product.id_category_product', '=', 'category_product.id_category_product')->where('product.id_category_product', $id_category_product)->paginate(5);

        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case 1:
                    $category_product_by_id = product::join('category_product', 'product.id_category_product', '=', 'category_product.id_category_product')->where('product.id_category_product', $id_category_product)->where('price', '<', 100000)->paginate(2);
                    // dd($category_product_by_id);
                    break;
                case 2:
                    $category_product_by_id = product::join('category_product', 'product.id_category_product', '=', 'category_product.id_category_product')->where('product.id_category_product', $id_category_product)->whereBetween('price', [100000,150000])->paginate(2);
                    break;
                case 3:
                    $category_product_by_id = product::join('category_product', 'product.id_category_product', '=', 'category_product.id_category_product')->where('product.id_category_product', $id_category_product)->whereBetween('price', [250000,300000])->paginate(2);
                    break;
                case 4:
                    $category_product_by_id = product::join('category_product', 'product.id_category_product', '=', 'category_product.id_category_product')->where('product.id_category_product', $id_category_product)->where('price', '>', 300000)->paginate(2);
                    break;
            }
        }

        return view('user.shop.shop')->with('category_product_by_id', $category_product_by_id);
    }
}
