<?php

namespace App\Listeners;

use App\Events\MessageCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageCreatedListener
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
     * @param  MessageCreated  $event
     * @return void
     */
    public function handle(MessageCreated $event)
    {
        $mail=(new MailMessage)
            ->subject(Lang::getFromJson('Hello'.$event->message->author_name.'.This is our answer from your last query'))
            ->line(Lang::getFromJson($event->response->content))
            ->line(Lang::getFromJson('Send with heart by SAMK TRAVEL & TOUR'));
         Mail::to($event->message->author_email)->send($mail);
         session()->flash('message',$event->notification);
    }
}
