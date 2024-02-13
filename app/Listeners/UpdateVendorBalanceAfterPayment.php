<?php

namespace App\Listeners;

use App\Models\Vendor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateVendorBalanceAfterPayment
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
        $invoice = $event->invoice;
        $vendor = Vendor::find($invoice->vendor_id);
        $vendor->balance -= $invoice->total;
        $vendor->update();
    }
}
