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
        Schema::table('receptions', function (Blueprint $table) {
            $table->string('vendor_invoice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receptions', function (Blueprint $table) {
            $table->dropColumn('vendor_invoice');
        });
    }
};
