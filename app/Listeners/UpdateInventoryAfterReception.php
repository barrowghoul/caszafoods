<?php

namespace App\Listeners;

use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateInventoryAfterReception
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $reception = $event->reception;

        foreach($reception->reception_details as $detail){
            
            Item::findOrFail($detail->item_id)->increment('on_hand', $detail->quantity);

        }
    }
}
