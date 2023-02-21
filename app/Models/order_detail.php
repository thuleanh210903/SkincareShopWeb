<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'id_product' ,   'id_order' ,'product_name','price','quantity'/* Trường Trong Bảng */
   ]; 
   protected $primaryKey =  'id_order_detail'; /* Khóa Chính */
   protected $table =   'order_detail'; /* Tên Bảng */

    use HasFactory;
}
