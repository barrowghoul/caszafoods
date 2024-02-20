<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\VendorInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->hasRole('Administrador')){
            $vendor_invoice_total = DB::table('vendors')->sum('balance');
            $due_pos = PurchaseOrder::where('status', 'enviada')
                                    ->whereDate('delivery_date', '<', \Carbon\Carbon::now())->get();
            $due_invoices = VendorInvoice::where('status', 'pendiente')
                                    ->whereDate('pay_date', '<', \Carbon\Carbon::now())->get();
            return view('dashboards.admin', compact('vendor_invoice_total','due_pos','due_invoices'))->render();
        }elseif(auth()->user()->hasRole('Inventarios')){
            $data = Item::selectRaw('name, on_hand')
                            ->where('on_hand', '<=', 'min')
                            ->orderBy('id', 'asc')->get()->take(5);
            return view('dashboards.inventory', compact('data'))->render();
        }
    }
}
