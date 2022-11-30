<?php

namespace App\Jobs;

use App\Models\Cbrf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class cbfr implements ShouldQueue
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
        $response = Http::get('https://www.cbr-xml-daily.ru/daily_json.js');
//        Log::info($response);
        $valute = $response->json('Valute');
        Log::info($valute);
        if($valute[0] = 'USD'){
            $cbrf = [];
            $cbrf['usdrub'] = $valute[1]['Value'];
            $data = new Cbrf($cbrf);
            $data->save();
//            $cbrf['created_at'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format(DATE_ATOM);
        }
//        foreach ($valute as $key => $value){
//            $value['name'] = $key;
//            $coin['coin_id'] = $coin['id'];
//            unset($coin['id']);
//            $coin['timestamp'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format(DATE_ATOM);
//            $data = new WtmCoin($coin);
//            $data->save();
//        }
    }
}
