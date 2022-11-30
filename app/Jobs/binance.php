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
        $coins = Coin::query()->where('coin_active',1)->get();
//        $coinArray = [];
        foreach ($coins as $coin) {
//           $coinArray[] = '"' . $coin->short_name . 'USDT"';
            $response = Http::get('https://api.binance.com/api/v3/ticker/24hr', ['symbol'=>$coin->short_name.'USDT']);
            Log::info($coin->short_name . ' ' . $response->json('code'));
//            $response->json('code')
        }
//        $symbols = '[' . implode(',',$coinArray) . ']';
//        Log::info($symbols);
//        $symbols = '["BTCUSDT","DOGEUSDT"]';
//        $response = Http::get('https://api.binance.com/api/v3/ticker/24hr', ['symbols'=>$symbols]);
////        'weightedAvgPrice'
        $coinsPrice = $response->json();
//         Log::info($coinsPrice);
        foreach ($coinsPrice as $coin){
            $binanceData = [];
            $binanceData['created_at'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format(DATE_ATOM);
            $coinSymbol = substr($coin->symbol,0,-4);
//            $coin['short_name'] = $coin['id'];
            $shortName = Coin::query()->where('short_name',$coinSymbol)->get();
            $coin['short_name'] = $shortName;
            unset($coin['id']);
            $data = new WtmCoin($coin);
            $data->save();
        }
    }
}
