<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\CartRepositoryInterface', 'App\Repositories\CartRepositoryEloquent' );

        $this->app->bind('App\Repositories\CartRepositoryInterface', function(){
            return new CartRepositoryEloquent(new Cart());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
