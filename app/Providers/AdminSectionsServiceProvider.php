<?php

namespace App\Providers;

use App\Models\Category;
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
        \App\Models\Category::class => 'App\Http\Admin\Category',
        \App\Models\Post::class => 'App\Http\Admin\Post',
        \App\Models\Tag::class => 'App\Http\Admin\Tag',
        \App\Models\PartnerLink::class => 'App\Http\Admin\PartnerLinks',
        \App\Models\Company::class => 'App\Http\Admin\Company',
        \App\Models\Comment::class => 'App\Http\Admin\Comment',
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
