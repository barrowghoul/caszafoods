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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->decimal('cost', 8,2)->default(0);
            $table->decimal('min', 8,2)->default(0);
            $table->decimal('max', 8,2)->default(0);
            $table->decimal('on_hand', 8,2)->default(0);
            $table->unsignedBigInteger('family_id')->defaul(1);
            $table->foreign('family_id')->references('id')->on('families');
            $table->unsignedBigInteger('unit_id')->default(1);
            $table->foreign('unit_id')->references('id')->on('units');
            $table->decimal('factor', 8,2)->default(0);
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('taxes');
            $table->boolean('is_service')->default(0);
            $table->softDeletes();
            $table->decimal('ieps', 8,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
