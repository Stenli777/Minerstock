<?php

namespace App\Jobs;

use App\Models\WtmCoin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class wtm_parse_coins implements ShouldQueue
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
        $agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.5845.140 Safari/537.36';
        $responseAsic = Http::withHeaders([
            'User-Agent' => $agent
        ])->get('https://whattomine.com/asic.json');
        $coinsAsic = $responseAsic->json('coins');
        sleep(rand(5, 12));
        $responseCoin = Http::withHeaders([
            'User-Agent' => $agent
        ])->get('https://whattomine.com/coins.json');
        $coinsCoin = $responseCoin->json('coins');

        $allCoins = array_merge($coinsAsic, $coinsCoin);
        foreach ($allCoins as $key => $coin)
            $allCoins[$key]['name'] = $key;
        usort($allCoins, function ($a, $b){
           return -($a['exchange_rate'] <=> $b['exchange_rate']);
        });

        foreach ($allCoins as $key => $coinFromList) {
            sleep(rand(5, 12));
            $response = Http::withHeaders([
                'User-Agent' => $agent
            ])->get("https://whattomine.com/coins/{$coinFromList['id']}.json?hr=1.0&p=0.0&fee=0.0&cost=0.0&cost_currency=USD&hcost=0.0&span_br=&span_d=24");
            $coin = $response->json();
            if(isset($coin['id'])) {

                $coin['name'] = $coinFromList['name'];
                $coin['coin_id'] = $coin['id'];
                unset($coin['id']);
                $coin['estimated_rewards'] = str_replace(',', '', $coin['estimated_rewards']);
                if (isset($coin['estimated_rewards']) && is_numeric($coin['estimated_rewards'])) {
                    $coin['estimated_rewards'] = (float)$coin['estimated_rewards'];
                } else {
                    $coin['estimated_rewards'] = null;
                }
                $existingCoin = WtmCoin::where('coin_id', $coin['coin_id'])->first();

                if ($existingCoin) {
                    if($key != $existingCoin['name']) {
                        continue;
                    }
                    $existingCoin->update($coin);
                } else {
                    WtmCoin::create($coin);
                }
            }

        }

    }
}
