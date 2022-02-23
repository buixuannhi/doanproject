<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\pagination\Paginator;
use App\Models\cart;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::usebootstrap();
        
        view()->composer('*', function($view){
            $cart = new Cart();
            $view->with(compact('cart'));
        });
    }
}
