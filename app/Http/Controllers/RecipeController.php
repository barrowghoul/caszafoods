<?php

namespace App\Http\Controllers;

use App\DataTables\RecipeDataTable;
use App\Models\Item;
use App\Models\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecipeDataTable $dataTable)
    {
        return $dataTable->render('recipes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : RedirectResponse
    {
        $recipe = new Recipe();
        $recipe->user_id = auth()->user()->id;
        $recipe->save();

        return redirect()->route('recipes.edit', $recipe->id);
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
        $recipe = Recipe::findOrFail($id);

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:200',            
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->name = $request->name;
        $recipe->status = $request->status;
        $recipe->description = $request->description;
        $recipe->save();
        toastr()->success('Receta actualizada correctamente!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function load_items(Request $request, string $id) {
        if($request->search == null ){
            $items = Item::where('is_service', 0)
            ->orderBy('name', 'asc')
            ->take(10)
            ->get();
        }
        else{
            $items = Item::where('is_service', 0)
                ->where('name', 'like', '%'.$request->search.'%')
                ->orderBy('name', 'asc')
                ->take(10)
                ->get();
        }

        return view('recipes.items-table', compact('items'))->render();
    }
}
