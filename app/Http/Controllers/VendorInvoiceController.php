<?php

namespace App\Http\Controllers;

use App\DataTables\VendorInvoiceDataTable;
use App\Events\VendorInvoicePayment;
use App\Models\VendorInvoice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VendorInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VendorInvoiceDataTable $dataTable)
    {
        return $dataTable->render('vendor-invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit(string $id)
    {
        $invoice = VendorInvoice::find($id);
        return view('vendor-invoices.edit', compact('invoice'));
    }

    public function pay(Request $request, string $id) : Response{
        try{
            $invoice = VendorInvoice::find($id);
            $invoice->status = VendorInvoice::PAGADA;
            $invoice->transaction_code = $request->reference;
            $invoice->save();

            VendorInvoicePayment::dispatch($invoice);

            return response(['status' => 'success', 'message' => 'Factura pagada correctamente.'], 200);
        } catch (\Exception $e){
            return response(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
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
}
