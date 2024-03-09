<?php

namespace App\Http\Controllers;

use App\DataTables\WarehouseDataTable;
use App\DataTables\WarehouseItemsDataTable;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WarehouseDataTable $dataTable)
    {
        return $dataTable->render('warehouses.index');
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
    public function edit(WarehouseItemsDataTable $dataTable, string $id)
    {
        $warehouse = Warehouse::find($id); 
        return $dataTable->with('id', $id)->render('warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $warehouse = Warehouse::find($id);
        $warehouse->name = $request->name;
        $warehouse->description = $request->description;

        $warehouse->save();

        toastr()->success(__('Registro actualizado exitosamente!'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
