<?php

namespace App\Listeners;

use App\Events\TeamCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamCrudListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TeamCrud  $event
     * @return void
     */
    public function handle(TeamCrud $event)
    {
        session()->flash('message',$event->message);
    }
}
