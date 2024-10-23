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
        Schema::create('table_importorderdetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_import_order')->constrained('table_importorder');
            $table->foreignId('id_product')->constrained('table_product');
            // $table->double('import_price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_importorderdetail');
    }
};
