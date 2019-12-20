<?php

namespace App\Listeners;

use App\Events\EventCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\Newsletting;
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
    {   $nesletters=Newsletting::all();
        foreach($newsletters as $newsletter){
            Notification::route('mail',$newsletter->email)->markdown('admn.mail.newsletters',$event->myEvent);
        }
        session()->flash('message',$event->message);
    }
}
