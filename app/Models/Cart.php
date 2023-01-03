<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];
    public function cart_details()
    {
        return $this->hasMany(CartDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(usercredential::class);
    }
    protected $table = 'carts';
}
