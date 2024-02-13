<?php

namespace App\Http\Controllers;

use App\Events\ReceptionModified;
use App\Models\PurchaseOrderDetail;
use App\Models\Reception;
use App\Models\ReceptionDetail;
use Illuminate\Http\Request;

class ReceptionDetailController extends Controller
{
    public function store(Request $request, string $id)
    {
        try{
            $po_details = PurchaseOrderDetail::where('purchase_order_id', $id)->get();

            foreach($po_details as $po_detail){
                $detail = new ReceptionDetail([
                    'reception_id' => $request->reception_id,
                    'item_id' => $po_detail->item_id,
                    'quantity' => $po_detail->quantity,
                    'unit_price' => $po_detail->unit_price,
                    'tax_percentage' => $po_detail->tax_percentage,
                    'tax_amount' => $po_detail->tax_amount,
                    'ieps_percentage' => $po_detail->ieps_percentage,
                    'ieps_amount' => $po_detail->ieps_amount,
                    'total' => $po_detail->total,
                ]);
                $detail->save();


            }
            $reception = Reception::findOrFail($request->reception_id);
            $reception->vendor_id = $po_details[0]->purchase_order->vendor_id;
            $reception->purchase_order_id = $po_details[0]->purchase_order->id;
            $reception->save();
            ReceptionModified::dispatch($reception);

            return response(['status' => 'success']);

        }catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request){
        try{
            $detail = ReceptionDetail::findOrFail($request->id);
            if($request->field == 'quantity'){
                $detail->quantity = $request->value;
            }
            if($request->field == 'price'){
                $detail->unit_price = $request->value;
            }

            $detail->tax_amount = ($detail->quantity * $detail->unit_price * $detail->tax_percentage)/100;
            $detail->ieps_amount = ($detail->quantity * $detail->unit_price * $detail->ieps_percentage)/100;
            $detail->total = ($detail->quantity * $detail->unit_price) + $detail->tax_amount + $detail->ieps_amount;
            $detail->save();

            $reception = Reception::findOrFail($detail->reception_id);
            ReceptionModified::dispatch($reception);

            return response(['status' => 'success']);

        } catch (\Exception $e) {

            return response(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function get_details(string $id)
    {
        $reception = Reception::findOrFail($id);

        $details = ReceptionDetail::where('reception_id', $id)->get();

        if($details->count() == 0){
            return view('receptions.no-items')->render();
        }

        return view('receptions.details-table', compact('reception','details'))->render();
    }
}
