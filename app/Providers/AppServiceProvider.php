<?php

namespace App\Providers;
use App\Models\coupon;
use App\Models\category_post;
use App\Models\orders;
use App\Models\category_product;
use Illuminate\Support\Facades\Cookie;
use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\order_detail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\shipping;
use App\Models\post;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $all_category_product = category_product::all();

        View::share('all_category_product', $all_category_product);

        $all_product = product::all();

        View::share('all_product', $all_product);

        $cate_pro = product::get();

        View::share('cate_pro', $cate_pro);

        $category_product = category_product::orderby('id_category_product', "asc")->where('show', '1')->get();
        View::share('category_product', $category_product);

        $category_product_by_id = product::join('category_product', 'product.id_category_product', '=', 'category_product.id_category_product')->where('product.id_category_product', 'id_category_product')->get();
        View::share('category_product_by_id', $category_product_by_id);
        $detail_product = product::join('category_product', 'category_product.id_category_product', '=', 'product.id_category_product')->where('product.id_product', 'id_product')->get();
        View::share('detail_product', $detail_product);

                
        $all_coupon = coupon::all();
        View::share('all_coupon',$all_coupon);

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        View::share('today', $today);

        $all_category_post = category_post::all();
        View::share('all_category_post', $all_category_post);
        $all_post = post::all();
        View::share('all_post', $all_post);
        
        $cate_po = post::get();
        View::share('cate_po',$cate_po);

        $category_post = category_post::where('cate_post_status',1)->get();
        View::share('category_post',$category_post);

    }
}
