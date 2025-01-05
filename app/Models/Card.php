<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'image',
        'discount',
        'platform_id',
        'usage',
        'description',
        'type',
    ];
}
