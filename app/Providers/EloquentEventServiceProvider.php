<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Event;
use App\Models\Partner;
use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use App\Models\Slider;
use App\Models\Socialite;
use App\Models\Team;
use App\Models\User;
use App\Models\Video;
use App\Observers\CommentObserver;
use App\Observers\EventObserver;
use App\Observers\PartnerObserver;
use App\Observers\PortfolioCategoryObserver;
use App\Observers\PortfolioImageObserver;
use App\Observers\SliderObserver;
use App\Observers\SocialiteObserver;
use App\Observers\TeamObserver;
use App\Observers\UserObserver;
use App\Observers\VideoObserver;
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
        PortfolioImage::observe(PortfolioImageObserver::class);
        Slider::Observe(SliderObserver::class);
        Video::observe(VideoObserver::class);
        Team::observe(TeamObserver::class);
        Socialite::observe(SocialiteObserver::class);
        User::observe(UserObserver::class);
    }
}
