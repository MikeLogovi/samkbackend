<?php

namespace App\Listeners;

use App\Events\SliderCrud;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class SliderCrudListener
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
     * @param  SliderCrud  $event
     * @return void
     */
    public function handle(SliderCrud $event)
    {
        session()->flash('message',$event->message);
        
    
    }
}
