<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function purchase_menu() : View {
        return view('menus.purchase');
    }

    public function inventory_menu() : View {
        return view('menus.inventory');
    }

    public function accounts_payable_menu() : View {
        return view('menus.accounts-payable');
    }

    public function production_menu() : View {
        return view('menus.production');
    }
}
