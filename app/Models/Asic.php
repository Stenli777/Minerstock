<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asic extends Model
{
    use HasFactory;
    public function humanHashrate(){
    $short = $this->shortHashrate();
        return "$short[0] $short[1]H/s";
    }

    private function shortHashrate(){
        $hash = [
            'T'=>1000*1000*1000*1000,
            'G'=>1000*1000*1000,
            'M'=>1000*1000,
            'K'=>1000,
        ];
        foreach ($hash as $key => $value) {
            if ($this->hashrate > $value) {
                return [trim(trim(number_format($this->hashrate/($value),3),'0'),'.'),$key];
            }
        }
//        if ($this->hashrate > 1000*1000*1000*1000) {
//            return [trim(trim(number_format($this->hashrate/(1000*1000*1000*1000),3),'0'),'.'),'T'];
//        }
//        if ($this->hashrate > 1000*1000*1000) {
//            return [trim(trim(number_format($this->hashrate/(1000*1000*1000),3),'0'),'.'),'G'];
//        }
//        if ($this->hashrate > 1000*1000) {
//            return [trim(trim(number_format($this->hashrate/(1000*1000),3),'0'),'.'),'M'];
//        }
//        if ($this->hashrate > 1000) {
//            return [trim(trim(number_format($this->hashrate/1000,3),'0'),'.'),'K'];
//        }
        return [$this->hashrate,''];
    }

    public function efficiency(){
        $short = $this->shortHashrate();
        return number_format(($this->consumption / $short[0]),2)."Дж/$short[1]H";
    }
    public function producer(){
        return $this->belongsTo(Producer::class);
    }
    public function algorythm(){
        return $this->belongsTo(Algorythm::class);
    }
    public function coins(){
        return $this->hasMany(Coin::class,'algorythm_id','algorythm_id');
    }
//    public function expenses($expenses = 2){
//        $expenses = 2.0;
//        return $this->consumption / 1000 * $expenses * 24;
//    }
//    public function profit(){
//        $usdt = 62;
//        $coinPrice = 20000;
//        $short = $this->shortHashrate();
//        return static::minePerDay($this->hashrate) - $this->expenses();
//    }
//
//    private function minePerDay($this->hashrate) {
//        return (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 32 * $this->wtm_coin->difficulty);
//    }
}
