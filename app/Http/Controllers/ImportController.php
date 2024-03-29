<?php

namespace App\Http\Controllers;

use App\DataTables\ItemImportDataTable;
use App\Imports\ItemsImport;
use App\Imports\VendorsImport;
use App\Models\Item;
use App\Models\Vendor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    function index_item() : View{
        $items = Item::whereRaw('Date(created_at) = CURDATE()')
                ->orderByRaw('id DESC')->get();
        return view('imports.item-index', compact('items'));
    }

    function import_items() : RedirectResponse {

        try{
            Excel::import(new ItemsImport,request()->file('file'));
            toastr()->success('Articulos importados correctamente');

        }catch(\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            toastr()->error($failures);
            return redirect()->route('import.items');
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->route('import.items');
        }
        return redirect()->route('import.items');
    }

    function index_vendors() : view {

        $vendors = Vendor::whereRaw('Date(created_at) = CURDATE()')
                ->orderByRaw('id DESC')->get();
        return view('imports.vendor-index', compact('vendors'));

    }

    function import_vendors() : RedirectResponse{
        try{

            Excel::import(new VendorsImport, request()->file('file'));
            toastr()->success('Proveedores importados correctamente');

        }catch(\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();

            toastr()->error($failures);
            return redirect()->route('import.vendors');

        }catch(\Exception $e){
             
            toastr()->error($e->getMessage());
            return redirect()->route('import.vendors');

        }
        return redirect()->route('import.vendors');
    }
}
