<?php

namespace App\Observers;

use App\Models\Socialite;

class SocialiteObserver
{
    /**
     * Handle the socialite "created" event.
     *
     * @param  \App\Models\Socialite  $socialite
     * @return void
     */
    public function creating(Socialite $socialite)
    {
        $socialite->slug=str_slug($socialite->icon);
    }

    /**
     * Handle the socialite "updated" event.
     *
     * @param  \App\Models\Socialite  $socialite
     * @return void
     */
    public function updating(Socialite $socialite)
    {
        $socialite->slug=str_slug($socialite->icon);

    }

    /**
     * Handle the socialite "deleted" event.
     *
     * @param  \App\Models\Socialite  $socialite
     * @return void
     */
    public function deleted(Socialite $socialite)
    {
        //
    }

    /**
     * Handle the socialite "restored" event.
     *
     * @param  \App\Models\Socialite  $socialite
     * @return void
     */
    public function restored(Socialite $socialite)
    {
        //
    }

    /**
     * Handle the socialite "force deleted" event.
     *
     * @param  \App\Models\Socialite  $socialite
     * @return void
     */
    public function forceDeleted(Socialite $socialite)
    {
        //
    }
}
