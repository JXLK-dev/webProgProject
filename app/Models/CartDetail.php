<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'item_id',
        'quantity'
    ];

    protected $table='cart_details';

    public function updateQty($item, $qty){
        $this->attributes['qty'] = $item->qty ;
        self::save();
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
