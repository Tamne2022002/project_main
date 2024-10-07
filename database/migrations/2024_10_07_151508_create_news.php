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
        Schema::create('table_news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('desc');
            $table->mediumText('content');
            $table->string('photo'); 
            $table->boolean('status')->default(true);
            $table->boolean('featured')->default(false); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
