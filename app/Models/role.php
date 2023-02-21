<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'type_role',
    ];
    protected $primaryKey = 'id_role';
    protected $table ='role';
    use HasFactory;
}
