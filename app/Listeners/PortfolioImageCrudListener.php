<?php

namespace App\Listeners;

use App\Events\PortfolioImageCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PortfolioImageCrudListener
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
     * @param  PortfolioImageCrud  $event
     * @return void
     */
    public function handle(PortfolioImageCrud $event)
    {
        session()->flash('message',$event->message);
    }
}
