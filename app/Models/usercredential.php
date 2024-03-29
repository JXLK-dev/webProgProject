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
        return $this->hasMany(CartDetail::class, 'user_id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
}
