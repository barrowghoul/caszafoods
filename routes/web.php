<?php

use App\Events\RTRequisitionCreatedEvent;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseOrderDetail;
use App\Http\Controllers\PurchaseOrderDetailController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\ReceptionDetailController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeDetailController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\RequisitionDetailController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VendorController;
use App\Models\RequisitionDetail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');*/
    Route::get('profile', [DashboardProfileController::class, 'index'])->name('profile');
    Route::put('profile/{user}', [DashboardProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/password', [DashboardProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('settings', [DashboardProfileController::class, 'settings'])->name('settings');
    Route::get('users', [DashboardProfileController::class, 'users'])->name('users');
    Route::get('users/create', [DashboardProfileController::class, 'usersCreate'])->name('users.create');
    Route::post('users/create', [DashboardProfileController::class, 'usersStore'])->name('users.store');
    Route::get('users/edit/{user}', [DashboardProfileController::class, 'usersEdit'])->name('users.edit');
    Route::get('users/delete/{user}', [DashboardProfileController::class, 'usersDestroy'])->name('users.delete');
    Route::get('roles/create', [DashboardProfileController::class, 'roleCreate'])->name('roles.create');
    Route::get('roles/create', [DashboardProfileController::class, 'roles'])->name('roles.index');
    Route::post('roles/create', [DashboardProfileController::class, 'roleStore'])->name('roles.store');
    Route::get('profile/notifications', [DashboardProfileController::class, 'notifications'])->name('notifications');
    Route::get('profile/notifications/read/{notification}', [DashboardProfileController::class, 'notifications_mark_as_read'])->name('notifications.read');
    Route::get('profile/notifications/read/all', [DashboardProfileController::class, 'notifications_mark_all_as_read'])->name('notifications.read.all');
    Route::delete('/profile/notifications/delete/{id}', [DashboardProfileController::class, 'notifications_delete'])->name('notifications.delete');

    /**Menu routes */
    Route::get('purchase-menu', [MenuController::class, 'purchase_menu'])->name('purchase.menu');
    Route::get('inventory-menu', [MenuController::class, 'inventory_menu'])->name('inventory.menu');
    Route::get('accounts-payable-menu', [MenuController::class, 'accounts_payable_menu'])->name('accounts-payable.menu');
    Route::get('production-menu', [MenuController::class, 'production_menu'])->name('production.menu');

    /** Settings Routes */
    Route::get('settings/notifications', [SettingController::class, 'notification_settings'])->name('settings.notifications');
    Route::put('settings/email-settings', [SettingController::class, 'updateEmailSettings'])->name('settings.update-email');
    Route::put('settings/pusher-settings', [SettingController::class, 'updatePusherSettings'])->name('settings.update-pusher');
    Route::put('settings/notification-settings', [SettingController::class, 'updateNotificationSettings'])->name('settings.update-notification');

    /**Dashboard Route */
    Route::get('my-dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('my-dashboard');

    /*Import routes*/
    Route::get('import/items', [ImportController::class, 'index_item'])->name('import.items');
    Route::post('import/items', [ImportController::class, 'import_items'])->name('import.items');
    Route::get('import/vendors', [ImportController::class, 'index_vendors'])->name('import.vendors');
    Route::post('import/vendors', [ImportController::class, 'import_vendors'])->name('import.vendors');

    /**Items Route */
    Route::resource('items', App\Http\Controllers\ItemController::class)->names('items');

    /**Families Route */
    Route::resource('families', App\Http\Controllers\FamilyController::class)->names('families');

    /**Units Route */
    Route::resource('units', App\Http\Controllers\UnitController::class)->names('units');

    /**vendors Route */
    Route::resource('vendors', VendorController::class)->names('vendors');

    /**requisitions Route */
    Route::resource('requisitions', RequisitionController::class)->names('requisitions');
    Route::post('requisition/details', [RequisitionDetailController::class, 'store'])->name('requisition.details.store');
    Route::put('requisition/details', [RequisitionDetailController::class, 'update'])->name('requisition.details.update');
    Route::delete('/requisition/details/{id}', [RequisitionDetailController::class, 'destroy'])->name('requisition.details.destroy');

    /**Purchase orders Route */
    Route::resource('purchase-orders', PurchaseOrderController::class)->names('purchase-orders');
    Route::put('purchase-orders/remove/vendor/{id}', [PurchaseOrderController::class, 'remove_vendor'])->name('purchase-orders.remove.vendor');
    Route::put('purchase-orders/details/add/{id}', [PurchaseOrderDetailController::class, 'store'])->name('purchase-orders.details.store');
    Route::put('purchase-orders/details/update', [PurchaseOrderDetailController::class, 'update'])->name('purchase-orders.details.update');
    Route::get('purchase-orders/details/{id}', [PurchaseOrderDetailController::class, 'get_details'])->name('purchase-orders.details');
    Route::delete('purchase-orders/details/delete({id}', [PurchaseOrderDetailController::class, 'destroy'])->name('purchase-orders.details.destroy');
    Route::get('purchase-orders/add/items/{id}', [PurchaseOrderController::class, 'add_items'])->name('purchase-order.add.items');
    Route::put('purchase-orders/send/({id}', [PurchaseOrderController::class, 'send'])->name('purchase-orders.send');

    /**Receptions Route */
    Route::resource('receptions', ReceptionController::class)->names('receptions');
    Route::get('receptions/orders/{id}', [ReceptionController::class, 'get_orders'])->name('receptions.orders');
    Route::put('receptions/details/add/{id}', [ReceptionDetailController::class, 'store'])->name('reception.details.store');
    Route::get('receptions/details/{id}', [ReceptionDetailController::class, 'get_details'])->name('reception.details');
    Route::put('receptions/details/update', [ReceptionDetailController::class, 'update'])->name('receptions.details.update');
    Route::put('receptions/send/({id}', [ReceptionController::class, 'send'])->name('receptions.send');

    /**Vendor Invoices Routes */
    Route::resource('vendor-invoices', App\Http\Controllers\VendorInvoiceController::class)->names('vendor-invoices');
    Route::put('vendor-invoices/pay/{id}', [App\Http\Controllers\VendorInvoiceController::class, 'pay'])->name('vendor-invoices.pay');

    /**Warehouse Routes */
    Route::resource('warehouses', App\Http\Controllers\WarehouseController::class)->names('warehouses');

    /**Receipe Routes */
    Route::resource('recipes', App\Http\Controllers\RecipeController::class)->names('recipes');
    Route::get('recipes/list/items/{id}', [RecipeController::class, 'load_items'])->name('recipes.list.items');
    Route::put('recipes/details/add/{id}', [RecipeDetailController::class, 'store'])->name('recipes.details.store');
    Route::get('recipes/details/{id}', [RecipeDetailController::class, 'get_details'])->name('recipes.details');
    Route::delete('/recipes/details/{id}', [RecipeDetailController::class, 'destroy'])->name('recipes.details.destroy');
    Route::put('recipes/details/update', [RecipeDetailController::class, 'update'])->name('recipes.details.update');

    /** Test Routes */
    Route::get('pusher-test', function(){
        //dd(config('broadcasting'));
        RTRequisitionCreatedEvent::dispatch('hello there!!!');
    });
});

require __DIR__.'/auth.php';
