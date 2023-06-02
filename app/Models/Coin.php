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
        $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 32 * $this->wtm_coin->difficulty);
        if (in_array($this->id,[32,10,11,67,81,85,107,111,83])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / ($this->wtm_coin->difficulty);
        } if (in_array($this->id,[19,22,98])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 13 * $this->wtm_coin->difficulty);
        } if (in_array($this->id,[100])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 1 * $this->wtm_coin->difficulty);
        } if (in_array($this->id,[28])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 4 * $this->wtm_coin->difficulty);
        }
//        if (in_array($this->id,[32])) {
//            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 9 * $this->wtm_coin->difficulty);
//        }
        if (in_array($this->id,[104])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 12 * $this->wtm_coin->difficulty);
        }
        return $mine;
    }

    public function active(){
        return $this->where('coin_active',1);
    }

    private function binance(){
        return $this->hasMany(Binance::class);
//        return $this->hasMany(Binance::class)->latest()->first()->avg_price;
    }
    public function price(){
        return $this->binance()->latest()->first()?$this->binance()->latest()->first()->avg_price:0;
    }
    public function priceBtc(){
        return $this->price() / Binance::query()->where('coin_id',25)->latest()->first()->avg_price;
    }
}
