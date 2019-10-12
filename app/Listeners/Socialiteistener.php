<?php

namespace App\Listeners;

use App\Events\Socialite;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Socialiteistener
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
     * @param  Socialite  $event
     * @return void
     */
    public function handle(Socialite $event)
    {
        //
    }
}
