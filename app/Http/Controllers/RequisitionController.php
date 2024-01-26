<?php

namespace App\Http\Controllers;

use App\DataTables\RequisitionDataTable;
use App\Models\Item;
use App\Models\Requisition;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RequisitionDataTable $dataTable) : View|JsonResponse
    {
        return $dataTable->render('requisitions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : RedirectResponse
    {
        $requisition = new Requisition();
        $requisition->user_id = auth()->user()->id;
        $requisition->save();

        return redirect()->route('requisitions.edit', $requisition->id);

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
    public function edit(string $id) : View
    {
        $requisition = Requisition::findOrFail($id);
        $items = Item::where('is_service', false)->get();

        return view('requisitions.edit', compact('requisition', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requisition = Requisition::findOrFail($id);
        foreach($requisition->details as $detail){
            if($detail->quantity <= 0) {
                return response(['status' => 'error', 'message' => 'Las cantidades solicitadas deben ser mayor a 0']);
            }
        }
        $requisition->status = 'revision';
        $requisition->save();

        return response(['status' => 'success', 'message' => 'La requisición se ha enviado a revisión']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
