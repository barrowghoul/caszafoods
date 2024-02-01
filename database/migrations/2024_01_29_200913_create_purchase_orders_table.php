<?php

use App\Models\PurchaseOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->enum('status', [PurchaseOrder::ABIERTA, PurchaseOrder::ENVIADA, PurchaseOrder::CANCELADA, PurchaseOrder::COMPLETA])->default(PurchaseOrder::ABIERTA);
            $table->decimal('tax',8,2)->default(0);
            $table->decimal('ieps', 8,2)->default(0);
            $table->decimal('subtotal', 8, 2)->default(0);
            $table->decimal('total', 8, 2)->default(0);
            $table->text('comments')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
