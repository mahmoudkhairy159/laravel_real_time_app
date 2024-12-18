<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserRegistered implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    /**
     * Create a new event instance.
     */
    public function __construct($user)
    {
        $this->user=$user;
        $this->message = "New user registered: {$user->name}";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

     //public channel
    // public function broadcastOn(): array
    // {
    //     return [
    //         new Channel('new_user_registered_channel'),
    //     ];
    // }
    //private channel
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('new_user_registered_channel'),
        ];
    }



    public function broadcastAs()
    {
        return 'new-user-registered-event';
    }
    public function broadcastWith(): array
    {
        return [
            'title' => 'New User Registered',
            'message' => $this->message,
        ];
    }
}
