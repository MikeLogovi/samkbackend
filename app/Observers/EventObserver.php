<?php

namespace App\Observers;

use App\Models\Event;

class EventObserver
{
    public function creating(Event $event){
        $event->slug=str_slug($event->name);
   }
    /**
     * Handle the event "created" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    
    public function created(Event $event)
    {
        //
    }

    /**
     * Handle the event "updated" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function updating(Event $event){
        if($event->name)
           $event->slug=str_slug($event->name);
   }
    public function updated(Event $event)
    {
        //
    }

    /**
     * Handle the event "deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        //
    }

    /**
     * Handle the event "restored" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the event "force deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
