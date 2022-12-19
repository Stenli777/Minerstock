<?php

namespace App\Console\Commands;

use App\Models\Asic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GerwinFeatures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gerwin:features';

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

        $features_task = Http::withToken($token, 'Token')->post('https://backend.gerwin.io/api/client/products/features/', [
            "locale"=> "ru",
            "product_name" => $asic->title,
            "callback" => 'https://mineinfo.ru/api/gerwin/callback'
        ]);

        $features_response = $features_task->json();

        $task_data = [
            'gerwin_id' => $features_response['id'],
            'asic_id' => $asic->id,
            'task_type' => 'features',
            'task_data' => json_encode([
                "locale"=> "ru",
                "product_name" => $asic->title,
            ]),
            'task_result' => null,
            'task_status' => $features_response['status'],
        ];

        $gerwin = new \App\Models\Gerwin($task_data);
        $gerwin->save();

        $this->info($task_data['gerwin_id']);

//        sleep(5);

        return 0;
    }
}
