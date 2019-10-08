<?php

namespace App\Listeners;

use App\Events\EventCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventCrudListener
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
     * @param  EventCrud  $event
     * @return void
     */
    public function handle(EventCrud $event)
    {
        session()->flash('message',$event->message);
    }
}
