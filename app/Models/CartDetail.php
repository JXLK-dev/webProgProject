<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    public function setInsideAreaAttribute($value)
    {
        $this->attributes['transaction_id'] = (int) $value;
    }
    public function cart()
    {
        return $this->belongsTo(usercredential::class);
    }
    public function item()
    {
        return $this->belongsTo(itemdetail::class);
    }
}
