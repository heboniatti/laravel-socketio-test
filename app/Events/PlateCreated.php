<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PlateCreated implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;

    public $plate;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($plate)
    {
        $this->plate = $plate;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('plate');
    }

    public function broadcastWith()
    {
        return [
            'name' => $this->plate->name
        ];
    }
}
