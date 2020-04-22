<?php

namespace App\Providers;

use App\Model\UUID\Keys;
use App\Infrastructure\UUID\KeyRepository;
use Illuminate\Support\ServiceProvider;

class UuidServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            Keys::class, KeyRepository::class
        );
    }
}
