<?php

namespace App\Listeners;

use App\Events\CommentCrud;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentCrudListener 
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
     * @param  CommentCrud  $event
     * @return void
     */
    public function handle(CommentCrud $event)
    {
        session()->flash('message',$event->message);
    }
}
