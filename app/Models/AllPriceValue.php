<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllPriceValue extends Model
{
    protected $fillable = [
        'value',
    ];

    public $timestamps = false;
}
