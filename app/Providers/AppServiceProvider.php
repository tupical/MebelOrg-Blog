<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;
use \Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        setlocale(LC_ALL, 'ru_RU.utf8');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
