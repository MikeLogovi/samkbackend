<?php

namespace App\Observers;

use App\Models\Partner;

class PartnerObserver
{
    /**
     * Handle the partner "created" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function creating(Partner $partner){
        $partner->slug=str_slug($partner->name);
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
    public function updating(Partner $partner){
        if($partner->name)
           $partner->slug=str_slug($partner->name);
   }

    /**
     * Handle the partner "deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "restored" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "force deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        //
    }
}
