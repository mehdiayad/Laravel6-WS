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
        
        $this->app->bind(
            'App\Repositories\Gestion\DatabaseGestionInterface',
            'App\Repositories\Gestion\DatabaseGestion'
            );
        
        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository'
            );
        
        $this->app->bind(
            'App\Repositories\ProductRepositoryInterface',
            'App\Repositories\ProductRepository'
            );
        
        $this->app->bind(
            'App\Repositories\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
            );
        
        $this->app->bind(
            'App\Repositories\CartRepositoryInterface',
            'App\Repositories\CartRepository'
            );
        
        $this->app->bind(
            'App\Repositories\AddressRepositoryInterface',
            'App\Repositories\AddressRepository'
            );
        
        $this->app->bind(
            'App\Repositories\AuthRepositoryInterface',
            'App\Repositories\AuthRepository'
            );
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
