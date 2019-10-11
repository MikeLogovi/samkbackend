<?php

namespace App\Observers;

use App\Models\Team;

class TeamObserver
{
    /**
     * Handle the team "created" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function creating(Team $team)
    {
        $team->slug=str_slug($team->name);
    }

    /**
     * Handle the team "updated" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function updating(Team $team)
    {
        $team->slug=str_slug($team->name);
    }

    /**
     * Handle the team "deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function deleted(Team $team)
    {
        //
    }

    /**
     * Handle the team "restored" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function restored(Team $team)
    {
        //
    }

    /**
     * Handle the team "force deleted" event.
     *
     * @param  \App\Models\Team  $team
     * @return void
     */
    public function forceDeleted(Team $team)
    {
        //
    }
}
