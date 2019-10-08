<?php

namespace App\Observers;

use App\Models\PortfolioImage;

class PortfolioImageObserver
{
    /**
     * Handle the portfolio image "created" event.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return void
     */
    public function creating(PortfolioImage $portfolioImage){
        $portfolioImage->slug =str_slug($portfolioImage->name);
    }
    public function created(PortfolioImage $portfolioImage)
    {
        //
    }
    public function updating(PortfolioImage $portfolioImage){
        if($portfolioCategory->name){
            $portfolioImage->slug =str_slug($portfolioImage->name);
        }
    }
    /**
     * Handle the portfolio image "updated" event.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return void
     */
    public function updated(PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Handle the portfolio image "deleted" event.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return void
     */
    public function deleted(PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Handle the portfolio image "restored" event.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return void
     */
    public function restored(PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Handle the portfolio image "force deleted" event.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return void
     */
    public function forceDeleted(PortfolioImage $portfolioImage)
    {
        //
    }
}
