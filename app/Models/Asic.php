<?php

namespace App\Models;

use App\Traits\CommentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Asic extends Model implements Sitemapable
{
    use HasFactory, CommentTrait;
    public function humanHashrate(){
    $short = $this->shortHashrate();
        return "$short[0] $short[1]H/s";
    }
    public function shortHashrate(){
        $hash = [
            'T'=>1000*1000*1000*1000,
            'G'=>1000*1000*1000,
            'M'=>1000*1000,
            'K'=>1000,
        ];
        foreach ($hash as $key => $value) {
            if ($this->hashrate > $value) {
                return [trim(trim(number_format($this->hashrate/($value),3),'0'),'.'), $key];
            }
        }
        return [$this->hashrate,''];
    }
    public function hashUnspeed(){
        $short = $this->shortHashrate();
        return "$short[0]";
    }
    public function countEfficiency(){
        $short = $this->shortHashrate();
        return trim(trim(number_format(($this->consumption / $short[0]),2, ',', ' '),0),',')." Дж/$short[1]H";
    }
    public function speedHash(){
        $short = $this->shortHashrate();
        return "$short[1]H/s";
    }
    public function producer(){
        return $this->belongsTo(Producer::class);
    }
    public function algorythm(){
        return $this->belongsTo(Algorythm::class);
    }
    public function usd(){
        return $this->hasOne(Cbrf::class);
    }
    public function exchangeUsd(){
        return Cbrf::query()->latest()->first('usdrub')->usdrub;
    }
    public function coins(){
        return $this->hasMany(Coin::class,'algorythm_id','algorythm_id');
    }
    public function wtm_coins(){
        $algorithmName = $this->algorythm->name;
        return WtmCoin::where('algorithm', $algorithmName)->where('exchange_rate', '!=', 0)->orderBy('exchange_rate', 'desc')->get();
    }
    public function save(array $options = []){
        $hash = implode($this->shortHashrate());
        $this->name=str_replace(['А','Р','о','Т','е'],['A','P,','o','T','e'],$this->name);
        $producer = $this->producer->name;
        $this->title = "ASIC майнер $producer $this->name $hash" . "H/s";
        $this->description = "Информация, характеристики и доходность ASIC майнера $producer $this->name $hash" . "H/s";
        $this->h1 = "ASIC майнер $producer $this->name $hash" . "H/s";
        $this->alias = str_replace('+','_plus',str_replace(['.',',',' ','/'],'_',strtolower("$producer $this->name $hash". "H/s")));
        $this->weight_brutto = $this->weight_brutto??str_replace(',', '.', $this->weight_brutto);
        parent::save($options);
    }
    public function energyPrice($energyPrice){
        return $energyPrice;
    }
    public function expenses($expenses = 2){
//        $expenses = 0.83;
        return $this->consumption / 1000 * $expenses * 24;
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(route('asic.show', $this->alias))->setPriority(1.0);
    }


//    public function similar(){
//        return ;
//    }
//    public function profit(){
//        $usdt = 62;
//        $coinPrice = 20000;
//        $short = $this->shortHashrate();
//        return (new Coin)->minePerDay($this->hashrate) - $this->expenses();
//    }
//
//    private function minePerDay($this->hashrate) {
//        return (86400 * $this->wtm_coin->block_reward * $hashrate) / (2 ** 32 * $this->wtm_coin->difficulty);
//    }
}
