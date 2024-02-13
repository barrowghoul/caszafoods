<?php

namespace App\Http\Controllers;

use App\Models\RequisitionDetail;
use Illuminate\Http\Request;

class RequisitionDetailController extends Controller
{
    function store(Request $request) {
        try{
            $detail = new RequisitionDetail();
            $detail->requisition_id = $request->requisition_id;
            $detail->item_id = $request->item_id;
            $detail->save();

            return response(['status' => 'success']);
        }catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function update(Request $request){
        if($request->quantity <= 0) {
            return response(['status' => 'error', 'message' => 'La cantidad debe ser mayor a 0']);
        }
        $detail = RequisitionDetail::findOrFail($request->id);
        $detail->quantity = $request->quantity;
        $detail->save();
    }

    function destroy(Request $request) {
        try{
            $detail = RequisitionDetail::findOrFail($request->id);
            $detail->delete();

            return response(['status' => 'success']);
        }catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
