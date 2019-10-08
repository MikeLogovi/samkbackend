<?php

namespace App\Listeners;

use App\Events\VideoCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VideoCrudListener
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
     * @param  VideoCrud  $event
     * @return void
     */
    public function handle(VideoCrud $event)
    {
        session()->flash('message',$event->message);
    }
}
