<?php

namespace App\Http\Controllers;

use App\DataTables\ReceptionDataTable;
use App\Events\ReceptionSuccessful;
use App\Models\PurchaseOrder;
use App\Models\Reception;
use App\Models\User;
use App\Notifications\ReceptionDone;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReceptionDataTable $dataTable)
    {
        return $dataTable->render('receptions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : RedirectResponse
    {
        $reception = New Reception([
            'user_id' => auth()->user()->id,
        ]);
        $reception->save();

        return redirect()->route('receptions.edit', $reception);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reception $reception) : View
    {
        return view('receptions.edit', compact('reception'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function get_orders(Request $request, string $id)
    {
        $reception = Reception::findOrFail($id);
        if($request->search_value == null){
            $orders = PurchaseOrder::join('vendors', 'vendors.id', 'purchase_orders.vendor_id')
            ->select('purchase_orders.*', 'vendors.name as vendor_name')
            ->where('purchase_orders.status', PurchaseOrder::ENVIADA)
            ->take(10)
            ->get();
        }else{
            $orders = PurchaseOrder::with('vendor')
            ->where('purchase_orders.status', PurchaseOrder::ENVIADA)
            ->wherehas('vendor', function($query) use($request){
                $query->where('name', 'like', '%'.$request->search_value.'%');
            })->take(10)->get();
        }

        return view('receptions.orders-table', compact('orders'))->render();
    }

    public function send(Request $request, string $id){
        try{
            $reception = Reception::findOrFail($id);
            $reception->vendor_invoice = $request->invoice_number;
            $reception->status = Reception::CERRADA;
            $reception->save();

            ReceptionSuccessful::dispatch($reception);

            $this->sendNotification($reception);

            return response(['status' => 'success', 'message' => 'Recepción cerrada correctamente']);

        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function sendNotification($reception) : void {
        $users = User::where('status', 1)->get();
        foreach($users as $user){
            if($user->hasPermissionTo('ver facturas')){
                $user->notify(new ReceptionDone($reception));
            }
        }
    }
}
