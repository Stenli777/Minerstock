<?php

namespace App\Console\Commands\Coin;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Models\WtmCoin;

class WhatToMine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coin:wtm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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
            $coin['timestamp'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format('Y-m-d H:i:s');
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
            $coin['timestamp'] = (new \DateTime())->setTimestamp($coin['timestamp'])->format('Y-m-d H:i:s');
            $data = new WtmCoin($coin);
            $data->save();
        }
    }
}
