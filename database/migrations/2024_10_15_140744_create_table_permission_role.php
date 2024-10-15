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
        Schema::create('table_permission_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_role')->constrained('table_roles')->onDelete('cascade');
            $table->foreignId('id_permission')->constrained('table_permissions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_permission_role');
    }
};
