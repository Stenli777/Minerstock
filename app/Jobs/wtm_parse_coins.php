<?php

namespace App\Jobs;

use App\Models\WtmCoin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
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
        $responseAsic = Http::get('https://whattomine.com/asic.json');
        $coinsAsic = $responseAsic->json('coins');

        $responseCoin = Http::get('https://whattomine.com/coins.json');
        $coinsCoin = $responseCoin->json('coins');

        $allCoins = array_merge($coinsAsic, $coinsCoin);

        foreach ($allCoins as $key => $coin) {
            // Преобразование данных
            $coin['name'] = $key;
            $coin['coin_id'] = $coin['id'];
            unset($coin['id']);
            $coin['timestamp'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format('Y-m-d H:i:s');

            // Найти или создать запись
            $existingCoin = WtmCoin::where('coin_id', $coin['coin_id'])->first();

            if ($existingCoin) {
                $existingCoin->update($coin);
            } else {
                WtmCoin::create($coin);
            }
        }

    }
}
