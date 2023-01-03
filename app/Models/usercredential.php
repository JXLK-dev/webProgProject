<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class usercredential extends Authenticatable
{
    use HasFactory;

    protected $table = 'usercredentials';

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
