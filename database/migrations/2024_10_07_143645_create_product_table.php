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
        Schema::create('table_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('table_product_categories')->onDelete('cascade');
            // $table->integer('category_id');
            $table->string('name');
            $table->mediumText('desc')->nullable();
            $table->mediumText('content')->nullable(); 
            $table->string('photo')->nullable(); 
            $table->double('regular_price')->nullable();
            $table->double('sale_price')->nullable();           
            $table->integer('discount')->nullable(); 
            $table->string('code')->nullable(); 
            $table->unsignedInteger('view')->default(0); 
            $table->boolean('status')->default(true);
            $table->boolean('featured')->default(false);
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
