<?php

namespace App\Listeners;

use App\Events\PortfolioCategoryCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PortfolioCategoryCrudListener
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
     * @param  PortfolioCategoryCrud  $event
     * @return void
     */
    public function handle(PortfolioCategoryCrud $event)
    {
        session()->flash('message',$event->message);
    }
}
