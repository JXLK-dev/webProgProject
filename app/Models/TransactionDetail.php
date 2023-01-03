<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id', 'item_id', 'quantity'
    ];
    protected $table = 'transactiondetails';

    public function tran(){
        return $this->belongsTo(Transaction::class);
    }
}
