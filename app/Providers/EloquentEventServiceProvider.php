<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Event;
use App\Models\Partner;
use App\Models\PortfolioCategory;
use App\Models\Slider;
use App\Observers\CommentObserver;
use App\Observers\EventObserver;
use App\Observers\PartnerObserver;
use App\Observers\PortfolioCategoryObserver;
use App\Observers\SliderObserver;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
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
        Comment::observe(CommentObserver::class);
        Event::observe(EventObserver::class);
        Partner::observe(PartnerObserver::class);
        PortfolioCategory::observe(PortfolioCategoryObserver::class);
        Slider::Observe(SliderObserver::class);

    }
}
