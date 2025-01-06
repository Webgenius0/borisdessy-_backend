<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardAvaiableAmount extends Model
{
    protected $fillable = [
        'card_id',
        'value',
    ];
    
    public $timestamps = false;

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
