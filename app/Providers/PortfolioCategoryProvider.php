<?php

namespace App\Providers;

use App\Observers\PortfolioCategoryObserver;
use Illuminate\Support\ServiceProvider;

class PortfolioCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PortfolioCategory::observe(PortfolioCategoryObserver::class);
    }
}
