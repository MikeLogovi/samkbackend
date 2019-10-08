<?php

namespace App\Observers;

use App\Models\PortfolioCategory;

class PortfolioCategoryObserver
{
     /**
     * Handle the PortfolioCategory "created" event.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return void
     */
    public function creating(PortfolioCategory $portfolioCategory){
        $portfolioCategory->slug =str_slug($portfolioCategory->name);
    }
    public function created(PortfolioCategory $portfolioCategory)
    {
        //
    }
    public function updating(PortfolioCategory $portfolioCategory){
        if($portfolioCategory->name){
            $portfolioCategory->slug =str_slug($portfolioCategory->name);
        }
    }
    /**
     * Handle the PortfolioCategory "updated" event.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return void
     */
    public function updated(PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Handle the PortfolioCategory "deleted" event.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return void
     */
    public function deleted(PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Handle the PortfolioCategory "restored" event.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return void
     */
    public function restored(PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Handle the PortfolioCategory "force deleted" event.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return void
     */
    public function forceDeleted(PortfolioCategory $portfolioCategory)
    {
        //
    }
}
