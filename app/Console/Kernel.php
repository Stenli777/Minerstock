<?php

namespace App\Console;

use App\Jobs\binance;
use App\Jobs\cbfr;
use App\Jobs\wtm_parse_coins;
use App\Models\Cbrf;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new wtm_parse_coins)->hourly();
//        $schedule->job(new binance)->hourly();
//        $schedule->job(new cbfr)->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
