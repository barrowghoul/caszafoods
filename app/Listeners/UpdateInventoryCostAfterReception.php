<?php

namespace App\Listeners;

use App\Models\Item;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateInventoryCostAfterReception
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

        foreach ($reception->reception_details as $detail) {
            $balance = $detail->quantity * $detail->unit_price;
            $item = Item::find($detail->item_id);
            $item->balance +=$balance;
            $cost = $item->balance / $item->on_hand;
            $item->cost = $cost;
            $item->update();
        }
    }
}
