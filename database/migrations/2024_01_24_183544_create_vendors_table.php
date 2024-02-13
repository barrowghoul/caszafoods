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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tax_id');
            $table->string('address');
            $table->string('contact');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->integer('pay_days')->default(0);
            $table->decimal('total', 8, 2)->default(0);
            $table->decimal('balance', 8, 2)->default(0);
            $table->boolean('status')->default(1);
            $table->integer('delivery_time')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
