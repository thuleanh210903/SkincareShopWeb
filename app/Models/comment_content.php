<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_content extends Model
{
    use HasFactory;
    protected $fillable=['content','idComment','idAuthur','seen'],$table='comment_content';
    public function getUser()
    {
       return $this->hasOne(User::class,'user_id','idAuthur');
    }
    public function getComment()
    {
        return $this->hasOne(comment::class,'id','idComment');
    }
    
}
    