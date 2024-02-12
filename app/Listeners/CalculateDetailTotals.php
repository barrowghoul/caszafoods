<?php

namespace App\Listeners;

use App\Models\Reception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateDetailTotals
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
        $this->calculateTotals($event->reception);
    }

    public function calculateTotals(Reception $reception) : void{

        $total = 0;
        $subtotal = 0;
        $tax = 0;
        $ieps = 0;

        foreach($reception->reception_details as $detail){
            $subtotal += $detail->quantity * $detail->unit_price;
            $tax += $detail->tax_amount;
            $ieps += $detail->ieps_amount;
            $total += $detail->total;
        }

        $reception->total = $total;
        $reception->tax = $tax;
        $reception->ieps = $ieps;
        $reception->subtotal = $subtotal;

        $reception->save();
    }
}
