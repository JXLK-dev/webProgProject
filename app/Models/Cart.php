<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
        'image',
        'price',
        'name',
        'total'
    ];
    public function items()
    {
        return $this->hasMany(itemdetails::class);
    }
    public function user()
    {
        return $this->belongsTo(usercredential::class);
    }
    protected $table = 'carts';
}
