<?php

namespace App\Providers;

use App\Models\AsicApplication;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('menu.admin', function ($view) {
            $unprocessedCount = AsicApplication::where('processed', false)->count();
            $view->with('unprocessedAsicApplicationsCount', $unprocessedCount);
        });
    }
}
