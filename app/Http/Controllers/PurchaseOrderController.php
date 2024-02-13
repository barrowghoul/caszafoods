<?php

namespace App\Http\Controllers;

use App\DataTables\PurchaseOrderDataTable;
use App\DataTables\RequisitionDataTable;
use App\Models\PurchaseOrder;
use App\Models\RequisitionDetail;
use App\Models\Vendor;
use App\Notifications\POSent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PurchaseOrderDataTable $dataTable)
    {
        return $dataTable->render('purchase-orders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : RedirectResponse
    {
        $po = new PurchaseOrder();
        $po->user_id = auth()->user()->id;
        $po->save();

        return redirect()->route('purchase-orders.edit', $po->id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $po = PurchaseOrder::findOrFail($request->po_id);
            $po->vendor_id = $request->vendor_id;
            $po->save();
            return response(['status' => 'success']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequisitionDataTable $dataTable, string $id)
    {
        $po = PurchaseOrder::findOrFail($id);
        $vendors = Vendor::where('status', 1)->get();

        return $dataTable->render('purchase-orders.edit', compact('po', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function send(Request $request, string $id)
    {
        try{
            $po = PurchaseOrder::findOrFail($id);
            if($po->vendor_id == null){
                return response(['status' => 'error', 'message' => 'No se ha seleccionado un proveedor']);
            }elseif($this->validatePO($po) == false){
                return response(['status' => 'error', 'message' => 'La cantidad de artículos y/o el precio no son correctos']);
            }

            $po->status = PurchaseOrder::ENVIADA;
            $po->save();

            $vendor = Vendor::findOrFail($po->vendor_id);
            $vendor->notify(new POSent($po));

            return response(['status' => 'success']);

        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function validatePO(PurchaseOrder $po) : bool{
        if($po->details->count() == 0){
            return false;
        }

        foreach($po->details as $detail){
            if($detail->quantity <= 0 || $detail->unit_price <= 0){
                return false;
            }
        }
        return true;
    }

    public function remove_vendor(string $id)
    {
        try
        {
            $po = PurchaseOrder::findOrFail($id);
            $po->vendor_id = null;
            $po->save();

            return response(['status' => 'success']);

        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    public function add_items(Request $request, string $id){
        if($request->search == null){
            $items = RequisitionDetail::with('item')->where('status', RequisitionDetail::OPENED)
                    //->where('purchase_id', null)->take(10)
                    ->orderBy('requisition_id', 'asc')
                    ->take(10)
                    ->get();
        }else{
            $items = RequisitionDetail::with('item')->where('status', RequisitionDetail::OPENED)
                    ->where('purchase_id', null)
                    ->whereHas('item', function($query) use ($request){
                        $query->where('name', 'like', '%' . $request->search . '%');
                    })->take(10)
                    ->orderBy('requisition_id', 'asc')
                    ->get();
        }

        return view('purchase-orders.items-table', compact('items'))->render();
    }

}
