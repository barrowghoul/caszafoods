<?php

namespace App\Listeners;

use App\Models\VendorInvoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateVendorInvoice
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
        $invoice = new VendorInvoice([
            'vendor_id' => $reception->vendor_id,
            'invoice' => $reception->vendor_invoice,
            'status' => VendorInvoice::PENDIENTE,
            'reception_id' => $reception->id,
            'pay_date' => \Carbon\Carbon::now()->addDays($reception->vendor->pay_days),
            'subtotal' => $reception->subtotal,
            'tax' => $reception->tax,
            'ieps' => $reception->ieps,
            'total' => $reception->total,
        ]);

        $invoice->save();

        foreach($reception->reception_details as $detail){
            $invoice_detail = $invoice->details()->create([
                'vendor_invoice_id' => $invoice->id,
                'item_id' => $detail->item_id,
                'quantity' => $detail->quantity,
                'tax_percentage' => $detail->tax_percentage,
                'tax_amount' => $detail->tax_amount,
                'ieps_percentage' => $detail->ieps_percentage,
                'ieps_amount' => $detail->ieps_amount,
                'unit_price' => $detail->unit_price,
                'total' => $detail->total,
            ]);
            
            $invoice_detail->save();
        }
    }
}
