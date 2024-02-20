<?php

namespace App\Listeners;

use App\Models\PurchaseOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClosePO
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
        $po = PurchaseOrder::findOrFail($reception->purchase_order_id);
        $po->status = PurchaseOrder::COMPLETA;
        $po->save();
    }
}
