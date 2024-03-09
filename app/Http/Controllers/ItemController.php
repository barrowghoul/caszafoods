<?php

namespace App\Http\Controllers;

use App\DataTables\ItemDataTable;
use App\DataTables\ItemsPurchaseDataTable;
use App\Http\Requests\ItemRequest;
use App\Models\Family;
use App\Models\Item;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ItemDataTable $dataTable)
    {
        return $dataTable->render('items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $taxes = Tax::all();
        $families = Family::all();
        $units = Unit::all();
        return view('items.create', compact('taxes', 'families', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request) : RedirectResponse
    {
        $item = new Item();
        $item->name = $request->name;
        $item->code = $request->code;
        $item->cost = $request->cost ?? 0;
        $item->min = $request->min ?? 0;
        $item->max = $request->max ?? 0;
        $item->is_service = $request->is_service;
        $item->on_hand = $request->on_hand ?? 0;
        if($item->is_service == 0){
            $item->family_id = $request->family_id;
            $item->unit_id = $request->unit_id;
        }else{
            $item->family_id = 1;
            $item->unit_id = 1;
        }
        $item->tax_id = $request->tax_id;
        $item->ieps = $request->ieps ?? 0;
        $item->save();

        toastr()->success("El articulo se ha creado correctamente");
        return redirect()->route('items.index');
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
    public function edit(ItemsPurchaseDataTable $dataTable, Item $item)
    {
        $taxes = Tax::all();
        $families = Family::all();
        $units = Unit::all();
        $warehouses = Warehouse::all();

        return $dataTable->with('id', $item->id)->render('items.edit', compact('item', 'taxes', 'families', 'units', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->code = $request->code;
        $item->cost = $request->cost;
        $item->is_service = $request->is_service;
        $item->on_hand = $request->on_hand;
        if($request->is_service == 0){
            $item->min = $request->min;
            $item->max = $request->max;
            $item->family_id = $request->family_id;
            $item->unit_id = $request->unit_id;
        }else{
            $item->min = 0;
            $item->max = 0;
            $item->family_id = 1;
            $item->unit_id = 1;
        }
        $item->tax_id = $request->tax_id;
        $item->ieps = $request->ieps;
        $item->save();

        toastr()->success("El articulo se ha actualizado correctamente");
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
