<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Models\User::class => 'App\Http\Admin\Users',
        \App\Models\Asic::class => 'App\Http\Admin\Asics',
        \App\Models\Producer::class => 'App\Http\Admin\Producers',
        \App\Models\Algorythm::class => 'App\Http\Admin\Algorythms',
        \App\Models\Coin::class => 'App\Http\Admin\Coins',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
//        $this->app->call([$this, 'registerNavigation']);
        parent::boot($admin);
    }
}
