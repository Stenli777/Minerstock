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
//      Coin - Beam
        if (in_array($this->id,[67])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 24 * $this->wtm_coin->difficulty);
        }
//      Coin - Horizen
        if (in_array($this->id,[19])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 25 * $this->wtm_coin->difficulty);
        }
//      Coin - BitcoinGold
        if (in_array($this->id,[98])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 14 * $this->wtm_coin->difficulty);
        }
//      Coin - Zcash
        if (in_array($this->id,[22])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 21 * $this->wtm_coin->difficulty);
        }
//      Coin - Komodo
//       if (in_array($this->id,[28])) {
//          $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 4 * $this->wtm_coin->difficulty);
//       }
//      Coin - Flux & Firo
        if (in_array($this->id,[104,60])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 16 * $this->wtm_coin->difficulty);
        }
//      Coin - Kadena
        if (in_array($this->id,[11])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 26 * $this->wtm_coin->difficulty);
        }
//      Coin - Monero
        if (in_array($this->id,[111])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 64 / $this->wtm_coin->difficulty);
        }
//      Coin - Sia
        if (in_array($this->id,[10])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 64 * $this->wtm_coin->difficulty);
        }
//      Coin - Conflux
        if (in_array($this->id,[107])) {
            $mine = (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 63 * $this->wtm_coin->difficulty);
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
