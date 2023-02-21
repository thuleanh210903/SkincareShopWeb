<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
      'cate_post_name','cate_post_status','cate_post_desc'/* Trường Trong Bảng */
   ]; 
   protected $primaryKey =  'id_cate_post'; /* Khóa Chính */
   protected $table =   'category_post'; /* Tên Bảng */

}
