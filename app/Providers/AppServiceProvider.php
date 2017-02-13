<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'city' => 'App\City',
            'related_event' => 'App\RelatedEvent',
            'holiday' => 'App\Holiday',
            'hotel' => 'App\Hotel',
            'photographer' => 'App\Photographer',
            'transport' => 'App\Transport',
            'event' => 'App\Event'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
