<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $table = 'cryptos';

    protected $fillable = [
        'name',
        'symbol',
        'rank',
        'price_usd',
        'price_eur',
    ];
}
