<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    public function algorythm(){
        return $this->belongsTo(Algorythm::class);
    }
    public function wtm_coin(){
        return $this->hasOne(WtmCoin::class,'name','name');
    }

    public function minePerDay($hashrate){
        return (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 32 * $this->wtm_coin->difficulty);
    }

    public function active(){
        return $this->where('coin_active',1);
    }

    public function binance(){
        return $this->hasMany(Binance::class);
    }
}
