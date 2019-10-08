<?php

namespace App\Listeners;

use App\Events\PartnerCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PartnerCrudListener
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
     * @param  PartenersCrud  $event
     * @return void
     */
    public function handle(PartnerCrud $event)
    {
        session()->flash('message',$event->message);
    }
}
