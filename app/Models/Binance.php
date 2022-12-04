<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binance extends Model
{
    use HasFactory;
    protected $table = 'binance_24_data';
    protected $guarded = [];
}
