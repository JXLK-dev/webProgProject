<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'image'
    ];
    protected $table = 'itemdetails';

    public function cart_detail(){
        return $this->belongsTo(CartDetail::class, 'item_id');
    }

    public function tran_detail(){
        return $this->belongsTo(TransactionDetail::class, 'item_id');
    }
}
