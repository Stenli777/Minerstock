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
        $response = Http::get('https://whattomine.com/asic.json');
//        Log::info(var_export($response->json(),true));
        $coinsAsic = $response->json('coins');
        foreach ($coinsAsic as $key => $coin) {
//            Log::info($coin);
            $coin['name'] = $key;
            $coin['coin_id'] = $coin['id'];
            unset($coin['id']);
            $coin['timestamp'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format(DATE_ATOM);
            $data = new WtmCoin($coin);
            $data->save();
        }

        $response = Http::get('https://whattomine.com/coins.json');
//        Log::info(var_export($response->json(),true));
        $coinsCoin = $response->json('coins');
        foreach ($coinsCoin as $key => $coin) {
//            Log::info($coin);
            $coin['name'] = $key;
            $coin['coin_id'] = $coin['id'];
            unset($coin['id']);
            $coin['timestamp'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format(DATE_ATOM);
            $data = new WtmCoin($coin);
            $data->save();
        }

    }
}
