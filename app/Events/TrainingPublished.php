<?php

namespace App\Events;

use App\Training;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TrainingPublished
{
    use InteractsWithSockets, SerializesModels;
    /**
     * @var Training
     */
    public $training;

    /**
     * Create a new event instance.
     *
     * @param Training $training
     */
    public function __construct(Training $training)
    {
        //
        $this->training = $training;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
