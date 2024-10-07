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
        Schema::create('table_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('table_product');
            $table->string('name'); 
            $table->string('photo')->nullable(); 
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('product_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');

         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery');
    }
};
