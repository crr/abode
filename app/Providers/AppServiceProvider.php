<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Abode\Abode;
use Cache;
use Nest\Nest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $abode = new Abode();

        if (Cache::get('nest.info') === null)
        {
            $nest = new Nest();
            $info = $nest->getDeviceInfo();
            Cache::put('nest.info', $info, 15);
        }

        if (Cache::get('nest.location') === null)
        {
            $nest = new Nest();
            $location = $nest->getUserLocations();
            Cache::put('nest.location', $location[0], 15);
        }

        view()->share('abode', $abode);
        view()->share('location', Cache::get('nest.location'));
        view()->share('info', Cache::get('nest.info'));
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
