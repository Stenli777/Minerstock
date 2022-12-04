<?php

namespace App\Jobs;

use App\Models\Coin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class binance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $coins = Coin::query()->where([['coin_active',1],['binance',1]])->get();
        $coinArray = [];
        foreach ($coins as $coin) {
           $coinArray[] = '"' . $coin->short_name . 'USDT"';
        }
        $symbols = '[' . implode(',',$coinArray) . ']';
        $response = Http::get('https://api.binance.com/api/v3/ticker/24hr', ['symbols'=>$symbols]);
        $coinsPrice = $response->json();
        foreach ($coinsPrice as $coin){
            $coinSymbol = substr($coin['symbol'],0,-4);
            $shortName = Coin::query()->where('short_name',$coinSymbol)->first();
            $binance_24_data = new \App\Models\Binance([
                'coin_id' => $shortName->id,
                'avg_price' => $coin['weightedAvgPrice'],
            ]);
            $binance_24_data->save();
        }
    }
}
