<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $notifcations=Order::where('notifcation',0)->get();
        view()->share('notifcations', $notifcations);
    }
}
