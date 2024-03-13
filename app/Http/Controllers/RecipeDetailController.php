<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use Illuminate\Http\Request;

class RecipeDetailController extends Controller
{
    function store(Request $request, string $id){
        //dd($request->recipe_id);
        try{
            $item = Item::findOrFail($id);
            $detail = new RecipeDetail([
                'recipe_id' => $request->recipe_id,
                'item_id' => $id,
                'unit_id'=> $item->unit->id,
            ]);
            $detail->save();
            return response(['status' => 'success']);
        }catch(\Exception $e){

            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function update(Request $request){
        try{
            $detail = RecipeDetail::findOrFail($request->id);            
            $detail->quantity = $request->value;
            $detail->save();

            return response(['status' => 'success']);
        }catch (\Exception $e){
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function destroy(string $id){
        try{
            $detail = RecipeDetail::findOrFail($id);
            $detail->delete();
            return response(['status' => 'success']);
        }catch (\Exception $e){
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function get_details(Request $request, string $id){
        $details = RecipeDetail::where('recipe_id', $id)->get();
        $recipe = Recipe::findOrFail($request->recipe_id);
        if($details->count() == 0){
            return view('recipes.no-items')->render();
        }
        return view('recipes.details-table', compact('details', 'recipe'))->render();
    }
}
