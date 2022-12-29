<?php

namespace App\Console\Commands\Sitemap;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class Generate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

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
