<?php

namespace App\Listeners;

use App\Events\Website;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WebsiteListener
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
     * @param  Website  $event
     * @return void
     */
    public function handle(Website $event)
    {
        session()->flash($event->message);
    }
}
