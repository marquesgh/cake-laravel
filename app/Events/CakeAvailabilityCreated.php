<?php

namespace App\Events;

use App\Models\CakeAvailability;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CakeAvailabilityCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cakeAvailability;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CakeAvailability $cakeAvailability)
    {
        $this->cakeAvailability = $cakeAvailability;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('cake-availability-store');
    }
}
