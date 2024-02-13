<?php

use App\Models\Reception;
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
        Schema::create('receptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id')->nullable();
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->enum('status', [Reception::ABIERTA, Reception::CERRADA, Reception::CANCELADA, Reception::PENDIENTE])->default(Reception::ABIERTA);
            $table->decimal('tax',8,2)->default(0);
            $table->decimal('ieps',8,2)->default(0);
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
        Schema::dropIfExists('receptions');
    }
};
