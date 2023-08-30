<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $name;

    /**
     * Create a new event instance.
     */
    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

   
}
