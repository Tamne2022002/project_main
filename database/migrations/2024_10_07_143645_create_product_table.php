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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('desc')->nullable();
            $table->mediumText('content')->nullable(); 
            $table->string('photo')->nullable(); 
            $table->double('regular_price')->nullable();
            $table->double('sale_price')->nullable();           
            $table->integer('discount')->nullable(); 
            $table->string('code')->nullable(); 
            $table->boolean('status')->default(false);

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
