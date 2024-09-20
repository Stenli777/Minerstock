<?php

namespace App\Providers;

use App\FormFields\MultipleSelectJSON;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Routing\Router;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\VoyagerServiceProvider as BaseVoyagerServiceProvider;

class VoyagerServiceProvider extends BaseVoyagerServiceProvider
{

    public function boot(Router $router, Dispatcher $event)
    {
        parent::boot($router, $event);

        Voyager::addFormField(MultipleSelectJSON::class);
    }

}
