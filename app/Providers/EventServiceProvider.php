<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //Sliders
        'App\Events\SliderCrud' => [
            'App\Listeners\SliderCrudListener',
        ],
        //PortfolioCategory
        'App\Events\PortfolioCategoryCrud' => [
            'App\Listeners\PortfolioCategoryCrudListener',
        ],
        //PortfolioImage
         'App\Events\PortfolioImageCrud' => [
            'App\Listeners\PortfolioImageCrudListener',
        ],
        //Events
        'App\Events\EventCrud' => [
            'App\Listeners\EventCrudListener',
        ],
        //Comments
        'App\Events\CommentCrud' => [
            'App\Listeners\CommentCrudListener',
        ],
        //Parteners
        'App\Events\PartnerCrud' => [
            'App\Listeners\PartnerCrudListener',
        ],
        //Video
        'App\Events\VideoCrud' => [
            'App\Listeners\VideoCrudListener',
        ],
         //Team
         'App\Events\TeamCrud' => [
            'App\Listeners\TeamCrudListener',
        ],
        //Mail
         'App\Events\SendNewMail' => [
            'App\Listeners\SendNewMailListener',
        ],
         'App\Events\MessageCreated' => [
            'App\Listeners\MessageCreatedListener',
        ],

         //website
         'App\Events\Socialite' => [
            'App\Listeners\Socialiteistener',
        ],
         'App\Events\Website' => [
            'App\Listeners\WebsiteListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
