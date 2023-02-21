<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=['admin','idUsers','id_product','parent_id'],$table='comment';
    public function replies()
    { 
        return $this->hasMany(Reply::class,'idComment');
    }
    public function getContent()
    {
        return $this->hasOne(comment_content::class,'id','idComment');
    }

}
