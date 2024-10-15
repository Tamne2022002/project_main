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
        Schema::create('table_grallery', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_parent')->constrained('table_product')->onDelete('cascade');
            $table->string('photo_path')->nullable();
            $table->string('photo_name');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_grallery');
    }
};
