<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendNewMail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $response;
    public $notification;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$response,$notification)
    {
        $this->message=$message;
        $this->response=$response;
        $this->notification=$notification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }
}
