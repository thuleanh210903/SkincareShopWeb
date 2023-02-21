<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    'date_payment' ,  'status_payment' ,  'payment_method' 
   ]; 
   protected $primaryKey =  'id_payment'; /* Khóa Chính */
   protected $table =   'payment'; /* Tên Bảng */

}
