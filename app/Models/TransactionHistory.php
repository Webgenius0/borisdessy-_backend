<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{

    
    protected $fillable = [
        'user_id',
        'transection_number',
        'transaction_type',
        'card_type',
        'amount',
    ];


}
