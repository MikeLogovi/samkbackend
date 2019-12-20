<?php

namespace App\Listeners;

use App\Events\SendNewMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResponseMessage;
class SendNewMailListener implements ShouldQueue
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
     * @param  SendNewMail  $event
     * @return void
     */
    public function handle(SendNewMail $event)
    {
            session()->flash('message',$event->notification);
            Notification::route('mail', $event->message->author_email)
            ->notify(new ResponseMessage($event));
   }
}
