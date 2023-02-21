<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    'post_title'  ,  'id_cate_post','content','post_sum','post_meta_desc','post_status' /* Trường Trong Bảng */
   ]; 
   protected $primaryKey =  'id_post'; /* Khóa Chính */
   protected $table =   'post'; /* Tên Bảng */

}
