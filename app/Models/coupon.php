<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    'coupon_name','coupon_code','coupon_time','coupon_number','coupon_condition','date_start', 'date_end'/* Trường Trong Bảng */
   ]; 
   protected $primaryKey =  'id_coupon'; /* Khóa Chính */
   protected $table =   'coupon'; /* Tên Bảng */

}
