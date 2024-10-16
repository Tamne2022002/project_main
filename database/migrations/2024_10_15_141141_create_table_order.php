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
        Schema::create('table_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_member')->constrained('table_member')->onDelete('cascade');
            $table->string('order_code');
            $table->string('fullname');
            $table->string('phone');
            $table->string('address');
            $table->string('note')->nullable();
            $table->double('total_price');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_order');
    }
};
