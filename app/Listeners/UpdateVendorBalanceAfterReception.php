<?php

namespace App\Listeners;

use App\Models\Vendor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateVendorBalanceAfterReception
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
        $vendor = Vendor::find($reception->vendor_id);
        $vendor->balance += $reception->total;
        $vendor->total += $reception->total;
        $vendor->update();
    }
}
