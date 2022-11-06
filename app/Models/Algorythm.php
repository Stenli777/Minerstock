<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Algorythm extends Model
{
    use HasFactory;

    public function coins(){
        return $this->hasMany(Coin::class);
    }
    public function asics(){
        return $this->hasMany(Asic::class);
    }
}
