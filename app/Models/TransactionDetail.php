<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'item_id', 'quantity', 'date'
    ];

    public function tran()
    {
        return $this->belongsTo(usercredential::class);
    }

    public function item()
    {
        return $this->hasMany(CartDetail::class, 'transaction_id');
    }
}
