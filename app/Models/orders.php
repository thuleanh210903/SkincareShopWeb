<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    'order_date' ,  'order_total_money' ,  'order_status' , 'user_id' , 'id_shipping'
   ]; 
   protected $primaryKey =  'id_order'; /* Khóa Chính */
   protected $table =   'orders'; /* Tên Bảng */

}
