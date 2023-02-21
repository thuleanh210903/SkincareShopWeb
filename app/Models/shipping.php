<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class shipping extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    
        'shipping_name',
        'shipping_address',
        'shipping_phone',
        'shipping_note'
        
    ];
    // protected $primaryKey = 'id_shipping';
    protected $table ='shipping';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
  
}
