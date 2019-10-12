<?php

namespace App\Listeners;

use App\Events\SendNewMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;

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
            $mail=(new MailMessage)
            ->subject(Lang::getFromJson('Hello'.$event->message->author_name.'.'))
            ->line(Lang::getFromJson('Your query has been sent correctly,we will respond you very soon.'))
            ->line(Lang::getFromJson('Send with heart by SAMK TRAVEL & TOUR'));
            Mail::to($event->message->author_email)->send($mail);
            session()->flash('message',$event->notification);

    }
}
