<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Client\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth
Route::get('/', function () {
    return view('user.index', ['title' => 'index']);
})->name('index');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

// otp
Route::post('otp', [UserController::class, 'otp'])->name('otp');
Route::post('otp_resend', [UserController::class, 'otp_resend'])->name('otp_resend');
//new pass
Route::get('forgotPassword', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('forgotPassword', [UserController::class, 'forgotPassword_action'])->name('forgotPassword.action');
//user
Route::get('/user', 'App\Http\Controllers\UserController@user');
Route::get('/save-profile', 'App\Http\Controllers\UserController@save_profile');
Route::get('/view-order-history', 'App\Http\Controllers\UserController@view_order_history');
Route::get('/view-order-detail-user/{id_order}', 'App\Http\Controllers\UserController@view_order_detail');



















// Route::put('/detail/{$id_product}',[ProductController::class,'show_product'])->name('product.detail');
Route::resource('/product', CategoryProduct::class);
Route::get('/shop-detail/{id_product}', 'App\Http\Controllers\admin\ProductController@show_product_detail');


//Category Product Index
Route::get('/shop', 'App\Http\Controllers\admin\CategoryProduct@show_category');
Route::get('/shop_category_product/{id_category_product}', 'App\Http\Controllers\admin\CategoryProduct@show_product');

//admin login
Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'loginAction'])->name('admin.loginAction');


//comment
Route::post('/comment/{idProduct}', [CommentController::class, 'comment'])->name('comment');
Route::get('/all-comment', [CommentController::class, 'comment']);
Route::post('/reply/{idComment}', [CommentController::class, 'reply'])->name('reply');


Route::middleware('checkAdminLogin')->group(function () {
    //post
    Route::get('/all-post', 'App\Http\Controllers\admin\PostController@all_post')->name('admin.allpost');
    Route::get('/add-post', 'App\Http\Controllers\admin\PostController@add_post');
    Route::post('/save-post', 'App\Http\Controllers\admin\PostController@save_post');
    Route::get('/edit-post', 'App\Http\Controllers\admin\PostController@edit_post');
    Route::post('/update-post', 'App\Http\Controllers\admin\PostController@update_post');
    Route::get('/delete-post/{id_post}', 'App\Http\Controllers\admin\PostController@delete_post');
    Route::get('/category_post/{id_cate_post}', 'App\Http\Controllers\admin\CategoryPostController@show_post');
    Route::get('/post/{id_post}', 'App\Http\Controllers\admin\PostController@show_post_detail');
    //category post
    Route::get('/all-category-post', 'App\Http\Controllers\Admin\CategoryPostController@all_category_post');
    Route::get('/add-category-post', 'App\Http\Controllers\Admin\CategoryPostController@add_category_post');
    Route::post('/save-category-post', 'App\Http\Controllers\Admin\CategoryPostController@save_category_post');
    Route::get('/edit-category-post/{id_cate_post}', 'App\Http\Controllers\Admin\CategoryPostController@edit_category_post');
    Route::post('/update-category-post/{id_category_post}', 'App\Http\Controllers\Admin\CategoryPostController@update_category_post');
    Route::get('/delete-category-post/{id_cate_post}', 'App\Http\Controllers\Admin\CategoryPostController@delete_category_post');
    //Product
    Route::get('/all-product', 'App\Http\Controllers\admin\ProductController@all_product');
    Route::get('/add-product', 'App\Http\Controllers\admin\ProductController@add_product');
    Route::post('/save-product', 'App\Http\Controllers\admin\ProductController@save_product');
    Route::get('/edit-product', 'App\Http\Controllers\admin\ProductController@edit_product');
    Route::post('/update-product', 'App\Http\Controllers\admin\ProductController@update_product');
    Route::get('/delete-product/{id_product}', 'App\Http\Controllers\admin\ProductController@delete_product');
    Route::get('/detail/{id_product}', 'App\Http\Controllers\admin\ProductController@show_product');
    //Category Product

    Route::get('/all-category-product', 'App\Http\Controllers\admin\CategoryProduct@all_category_product');
    Route::get('/add-category-product', 'App\Http\Controllers\admin\CategoryProduct@add_category_product');
    Route::post('/save-category-product', 'App\Http\Controllers\admin\CategoryProduct@save_category_product');
    Route::get('/edit-category-product/{id_category_product}', 'App\Http\Controllers\admin\CategoryProduct@edit_category_product');
    Route::post('/update-category-product/{id_category_product}', 'App\Http\Controllers\admin\CategoryProduct@update_category_product');
    Route::get('/delete-category-product/{id_category_product}', 'App\Http\Controllers\admin\CategoryProduct@delete_category_product');
    //coupon
    Route::post('/check-coupon', 'App\Http\Controllers\Client\CartController@check_coupon');
    Route::get('/add-coupon', 'App\Http\Controllers\admin\CouponController@add_coupon');
    Route::post('/save-coupon', 'App\Http\Controllers\admin\CouponController@save_coupon');
    Route::get('/all-coupon', 'App\Http\Controllers\admin\CouponController@all_coupon');
    Route::get('/edit-coupon', 'App\Http\Controllers\admin\CouponController@edit_coupon');
    Route::post('/update-coupon/{id_coupon}', 'App\Http\Controllers\admin\CouponController@update_coupon');
    Route::get('/delete-coupon/{id_coupon}', 'App\Http\Controllers\admin\CouponController@delete_coupon');
    //order
    Route::get('/order-table', 'App\Http\Controllers\admin\OrderController@all_order');
    Route::get('/view-order-detail/{id_order}', 'App\Http\Controllers\admin\OrderController@order_detail');
    Route::get('/edit-order-status/{id_order}', 'App\Http\Controllers\admin\OrderController@show_edit_order');
    Route::post('/update-order-status/{id_order}', 'App\Http\Controllers\admin\OrderController@update_order_status');
});



Route::post('/save-cart', 'App\Http\Controllers\client\CartController@save_cart');
Route::get('/show-cart', 'App\Http\Controllers\client\CartController@show_cart');
Route::get('/delete-cart/{rowId}', 'App\Http\Controllers\client\CartController@delete_cart');
Route::post('/update-cart-quantity', 'App\Http\Controllers\client\CartController@update_cart_quantity');
//Checkout
Route::get('/check-out', 'App\Http\Controllers\Client\CheckoutController@checkout');
Route::post('/save-shipping', 'App\Http\Controllers\Client\CheckoutController@save_shipping');
Route::get('/save-checkout', 'App\Http\Controllers\Client\CheckoutController@save_checkout');
Route::get('/vnpay-payment', 'App\Http\Controllers\Client\CheckoutController@vnpay');
Route::post('/payment-option', 'App\Http\Controllers\Client\CheckoutController@payment_option');






//email
Route::get('send-mail', 'App\Http\Controllers\MailController@index');









Route::get('/danh-sach-khach-hang', function () {
    return view('admin.danh-sach-khach-hang');
});
Route::get('/danh-sach-nhan-vien', function () {
    return view('admin.danh-sach-nhan-vien');
});

Route::get('/form-add-don-hang', function () {
    return view('admin.form-add-don-hang');
});
Route::get('/form-add-new', function () {
    return view('admin.form-add-new');
});
Route::get('/form-add-nhan-vien', function () {
    return view('admin.form-add-nhan-vien');
});
Route::get('/form-add-san-pham', function () {
    return view('admin.form-add-san-pham');
});
Route::get('/phan-mem-ban-hang', function () {
    return view('admin.phan-mem-ban-hang');
});
Route::get('/quan-li-tin', function () {
    return view('admin.quan-li-tin');
});
Route::get('/quan-ly-bao-cao', function () {
    return view('admin.quan-ly-bao-cao');
});

Route::get('/table-data-customer', function () {
    return view('admin.table-data-customer');
});
Route::get('/table-data-oder', function () {
    return view('admin.table-data-oder');
});
Route::get('/table-data-product', function () {
    return view('admin.table-data-product');
});
