<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardCountry extends Model
{
    protected $fillable = [
        'card_id',
        'name',
    ];
    
    public $timestamps = false;

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
