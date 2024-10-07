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
        Schema::create('table_setting', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('desc')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('zalo')->nullable();
            $table->string('address')->nullable();
            $table->string('fanpage')->nullable();
            $table->string('website')->nullable();
            $table->string('link_map')->nullable();
            $table->mediumText('iframe_map')->nullable(); 
            $table->string('logo')->nullable();
            $table->string('favicon_path')->nullable();
            $table->string('favicon_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
