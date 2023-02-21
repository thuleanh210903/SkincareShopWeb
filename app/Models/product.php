<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'name_product' , 'number' ,'show_product', 'price','product_image','describe_product','id_category_product',/* Trường Trong Bảng */
    // ,  'GiaBan' ,  'MoTa' , 'SoLuong' , 'idHinhAnh' ,'TinhTrang' ,'HienThi' , 'idDanhMucSP'
   ]; 
   protected $primaryKey =  'id_product'; /* Khóa Chính */
   protected $table =   'product'; /* Tên Bảng */

   public function category(){
    return $this->belongsTo('App\Models\category_product', 'id_category_product');
   }
}
