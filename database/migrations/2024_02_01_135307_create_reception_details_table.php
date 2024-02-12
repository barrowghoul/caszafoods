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
        Schema::create('reception_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reception_id');
            $table->foreign('reception_id')->references('id')->on('receptions');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');
            $table->decimal('quantity', 8, 2)->default(0);
            $table->decimal('unit_price', 8, 2)->default(0);
            $table->decimal('tax_percentage', 8, 2)->default(0);
            $table->decimal('tax_amount', 8, 2)->default(0);
            $table->decimal('total', 8, 2)->default(0);
            $table->decimal('ieps_percentage', 8, 2)->default(0);
            $table->decimal('ieps_amount', 8, 2)->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reception_details');
    }
};
