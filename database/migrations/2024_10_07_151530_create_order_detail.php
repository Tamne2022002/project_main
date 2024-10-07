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
        Schema::create('table_order_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('table_order'); 
            $table->foreignId('product_id')->constrained('table_product');
            $table->integer('quantity');
            $table->double('regular_price');
            $table->double('sale_price');
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
