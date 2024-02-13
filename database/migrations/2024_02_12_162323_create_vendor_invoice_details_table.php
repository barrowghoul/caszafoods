<?php

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
        Schema::create('vendor_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_invoice_id');
            $table->foreign('vendor_invoice_id')->references('id')->on('vendor_invoices');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->decimal('quantity', 8, 2)->default(0);
            $table->decimal('tax_percentage');
            $table->decimal('tax_amount', 8, 2)->default(0);
            $table->decimal('ieps_percentage', 8, 2)->default(0);
            $table->decimal('ieps_amount', 8, 2)->default(0);
            $table->decimal('unit_price', 8, 2);
            $table->decimal('total', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_invoice_details');
    }
};
