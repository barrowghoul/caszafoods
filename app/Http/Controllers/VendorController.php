<?php

namespace App\Http\Controllers;

use App\DataTables\VendorDataTable;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VendorDataTable $dataTable)
    {
        return $dataTable->render('vendors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request): RedirectResponse
    {
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->tax_id = $request->tax_id;
        $vendor->address = $request->address;
        $vendor->contact = $request->contact;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->pay_days = $request->pay_days;
        $vendor->delivery_time = $request->delivery_time;
        $vendor->save();

        toastr()->success("El proveedor se ha creado correctamente");
        return redirect()->route('vendors.index');
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
    public function edit(Vendor $vendor): View
    {
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorRequest $request, string $id): RedirectResponse
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->name = $request->name;
        $vendor->tax_id = $request->tax_id;
        $vendor->address = $request->address;
        $vendor->contact = $request->contact;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->pay_days = $request->pay_days;
        $vendor->delivery_time = $request->delivery_time;
        $vendor->balance = $request->balance;
        $vendor->total = $request->total;
        $vendor->save();

        toastr()->success("El proveedor se ha actualizado correctamente");
        return redirect()->route('vendors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $vendor = Vendor::findOrFail($id);
            if ($vendor->status == 1) {
                $vendor->status = 0;
            } else {
                $vendor->status = 1;
            }
            $vendor->save();
            return response(['status' => 'success', 'message' => 'Registro actualizado correctamente!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'No se puede actualizar el registro!']);
        }
    }
}
