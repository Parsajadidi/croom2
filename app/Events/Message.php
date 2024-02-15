<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $messages;
    public string $username;

    public function __construct($username ,$messages )
    {
        $this->messages = $messages;
        $this->username = $username;

    }


    public function broadcastOn(): array
    {

            return ['pj_chatroom'];

    }

    public function broadcastAs()
    {
        return 'message';
    }
}
