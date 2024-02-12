<?php

namespace App\Events;

use App\Models\Reception;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReceptionModified
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
