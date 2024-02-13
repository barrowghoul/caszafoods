<?php

use App\Models\VendorInvoice;
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
        Schema::create('vendor_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->string('invoice')->nullable();
            $table->enum('status',[VendorInvoice::PENDIENTE, VendorInvoice::PAGADA, VendorInvoice::CANCELADA, VendorInvoice::VENCIDA])->default(VendorInvoice::PENDIENTE);
            $table->unsignedBigInteger('reception_id');
            $table->foreign('reception_id')->references('id')->on('receptions');
            $table->date('pay_date')->nullable();
            $table->decimal('subtotal', 8,2)->default(0);
            $table->decimal('tax', 8,2)->default(0);
            $table->decimal('ieps', 8, 2)->default(0);
            $table->decimal('total', 8,2);
            $table->string('transaction_code')->nullable();
            $table->datetime('payed_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_invoices');
    }
};
