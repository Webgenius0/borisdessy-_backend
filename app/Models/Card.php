<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'card_name',
        'type',
        'platform_name',
        'price',
        'discount',
        'seller_name',
        'usage',
        'description',
        'image',
    ];

    public function cardCountries()
    {
        return $this->hasMany(CardCountry::class);
    }

    public function cardAvaialeAmounts()
    {
        return $this->hasMany(CardAvaiableAmount::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
