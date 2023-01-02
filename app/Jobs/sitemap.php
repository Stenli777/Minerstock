<?php

namespace App\Jobs;

use App\Models\Asic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class sitemap implements ShouldQueue
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
        SitemapGenerator::create(config('app.url'))

            ->hasCrawled(function (Url $url) {
                if (parse_url($url->url,PHP_URL_QUERY)) {
                    return;
                } if ($url->segment(1)=='asic') {
                    $url->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setPriority(1.0);
                    return $url;
                }
                $url->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8);
                return $url;
            })

            ->writeToFile(public_path('sitemap.xml'));
    }
}
