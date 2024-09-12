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
        $valute = $response->json('Valute');

        if (isset($valute['USD'])) {
            $usdrubValue = $valute['USD']['Value'];

            $cbrf = Cbrf::first();

            if ($cbrf) {
                $cbrf->update(['usdrub' => $usdrubValue]);
            } else {
                Cbrf::create(['usdrub' => $usdrubValue]);
            }
        }
    }
}
