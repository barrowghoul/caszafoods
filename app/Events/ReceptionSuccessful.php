<?php

namespace App\Events;

use App\Models\Reception;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReceptionSuccessful
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reception;

    /**
     * Create a new event instance.
     */
    public function __construct(Reception $reception)
    {
        $this->reception = $reception;
    }
}
