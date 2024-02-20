<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use App\Models\RequisitionDetail;
use Illuminate\Http\Request;

class PurchaseOrderDetailController extends Controller
{
    function store(Request $request, string $id){
        try{
            $item = RequisitionDetail::findOrFail($id);
            $item->purchase_id = $request->po_id;
            $item->status = RequisitionDetail::ORDERED;
            $item->save();

            $detail = new PurchaseOrderDetail([
                'purchase_order_id' => $request->po_id,
                'item_id' => $item->item_id,
                'requisition_detail_id' => $item->id,
                'tax_percentage' => $item->item->tax->factor,
                'ieps_percentage' => $item->item->ieps,
                'quantity' => $item->quantity,
            ]);
            $detail->save();

            return response(['status' => 'success']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function update(Request $request){
        try{
            $detail = PurchaseOrderDetail::findOrFail($request->id);
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

            $this->calc_total($detail->purchase_order_id);

            return response(['status' => 'success']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function calc_total(string $po){
        $po = PurchaseOrder::findOrFail($po);
        $subtotal = 0;
        $tax = 0;
        $ieps = 0;

        foreach($po->details as $detail){
            $subtotal += $detail->quantity * $detail->unit_price;
            $tax += $detail->tax_amount;
            $ieps += $detail->ieps_amount;
        }

        $po->subtotal = $subtotal;
        $po->tax = $tax;
        $po->ieps = $ieps;
        $po->total = $subtotal + $tax + $ieps;
        $po->save();
    }

    function destroy(Request $request, string $id){
        try{
            $detail = PurchaseOrderDetail::findOrFail($id);

            $requisition_detail = RequisitionDetail::findOrFail($detail->requisition_detail_id);
            $requisition_detail->purchase_id = null;
            $requisition_detail->status = 'abierta';
            $requisition_detail->save();

            $detail->delete();

            $this->calc_total($detail->purchase_order_id);

            return response(['status' => 'success']);

        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function get_details(Request $request, string $id) {
        $details = PurchaseOrderDetail::where('purchase_order_id', $id)->get();
        $po = PurchaseOrder::findOrFail($request->po_id);
        if($details->count() == 0){
            return view('purchase-orders.no-items')->render();
        }
        return view('purchase-orders.details-table', compact('details', 'po'))->render();
    }
}
