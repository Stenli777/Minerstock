<?php

namespace App\Console\Commands;

use App\Models\Asic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GerwinDescription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gerwin:description';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gerwin login token';

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
        $token_response = Http::post('https://backend.gerwin.io/api/auth/token/login', [
            "password" => env('GERWIN_PASSWORD'),
            "email" => env('GERWIN_LOGIN')
        ]);
        $token = $token_response->json('auth_token');

        $asic = Asic::with('producer')->whereNull('seo_text')->first();

        if (!$asic) {
            return 0;
        }

        $this->info("Selected {$asic->title}");

        $description = "Характеристики асика "
            . "Хэшрейт: {$asic->humanHashrate()}, "
            . "Энергоэффективность: {$asic->efficiency()}, "
            . "Производитель: {$asic->producer->name}, "
            . "Алгоритм: {$asic->algorythm->name}, "
            . "Потребление: " . number_format($asic->consumption,0,'',' ') . " Вт";

        if ($asic->sales_data_start != null) {
            $description .= ", Старт продаж: {$asic->sales_data_start}";
        }

//        $this->info(json_encode([
//            "locale"=> "ru",
//            "product_name" => $asic->title,
//            "product_information" => $description,
//            "product_keywords" => ["асик","майнер",$asic->producer->name,$asic->name]
//        ]));

        $description_task = Http::withToken($token, 'Token')->post('https://backend.gerwin.io/api/client/products/description/', [
            "locale"=> "ru",
            "product_name" => $asic->title,
            "product_information" => $description,
            "product_keywords" => ["асик","майнер",$asic->producer->name,$asic->name],
            "callback" => 'https://mineinfo.ru/api/gerwin/callback'
        ]);

        $description_response = $description_task->json();

        $task_data = [
            'gerwin_id' => $description_response['id'],
            'asic_id' => $asic->id,
            'task_type' => 'description',
            'task_data' => json_encode([
                    "locale"=> "ru",
                    "product_name" => $asic->title,
                    "product_information" => $description,
                    "product_keywords" => ["асик","майнер",$asic->producer->name,$asic->name]
            ]),
            'task_result' => null,
            'task_status' => $description_response['status'],
        ];

        $gerwin = new \App\Models\Gerwin($task_data);
        $gerwin->save();

        $this->info($task_data['gerwin_id']);

        sleep(5);

        return 0;
    }
}
