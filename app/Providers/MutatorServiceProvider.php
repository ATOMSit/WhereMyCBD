<?php

namespace App\Providers;

use Awobaz\Mutator\Facades\Mutator;
use Illuminate\Support\ServiceProvider;

class MutatorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Mutator::extend('mb_strtoupper', function ($model, $value, $key) {
            return mb_strtoupper($value);
        });
    }
}
