<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
class NewMessage extends Notification
{
    use Queueable;
    public $event;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event=$event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject(Lang::getFromJson('New message receive in SAM K TRAVEL & TOUR ADMINISTRATION'))
        ->line(Lang::getFromJson('Author name:'.$this->event->message->author_name))
        ->line(Lang::getFromJson('Author email:'.$this->event->message->author_name))
        ->line(Lang::getFromJson('The query message:'))
        ->line(Lang::getFromJson($this->event->message->content))
        ->line(Lang::getFromJson('Send with heart by SAM K TRAVEL AND TOUR'));
        
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
