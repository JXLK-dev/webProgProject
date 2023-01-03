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
        'quantity'
    ];
    public function items(){
        return $this->hasMany(Item_Details::class);
    }
    public function user(){
        return $this->belongsTo(maiBoutique::class);
    }
    protected $table='carts';
}
