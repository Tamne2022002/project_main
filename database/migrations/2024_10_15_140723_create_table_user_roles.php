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
        Schema::create('table_user_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_member')->constrained('table_member')->onDelete('cascade');
            $table->foreignId('id_role')->constrained('table_roles')->onDelete('cascade');
        
            $table->timestamps();
            $table->softDeletes(); 
            //$table->foreign('user_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_user_roles');
    }
};
