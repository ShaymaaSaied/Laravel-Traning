<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        $this->app->singleton('App\Billing\Stripe',function (){

            return new \App\Billing\Stripe(Config('services.stripe.webhook.secret'));

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
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar',function ($view){
            $view->with('archives',\App\Post::archives());
        });
    }
}
