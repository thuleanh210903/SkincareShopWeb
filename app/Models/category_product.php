<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    'name_category_product','show','image' /* Trường Trong Bảng */
   ]; 
   protected $primaryKey =  'id_category_product'; /* Khóa Chính */
   protected $table =   'category_product'; /* Tên Bảng */

}
