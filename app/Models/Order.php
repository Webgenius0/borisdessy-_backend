<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $gaurded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function orderCard()  {
        return $this->hasMany(OrderCard::class);
    }
}
