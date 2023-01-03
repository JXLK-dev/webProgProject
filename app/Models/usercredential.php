<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class usercredential extends Authenticatable
{
    use HasFactory;

    protected $table='mai_boutiques';

    public function cart(){
        return $this->hasOne(Cart::class);
    }
}
