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
            $table->foreignId('id_list')->constrained('table_product_list')->onDelete('cascade');
            $table->string('name');
            //$table->integer('category_id');
            $table->mediumText('desc')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('photo_name')->nullable();
            $table->string('photo_path')->nullable();
            $table->double('regular_price')->nullable();
            $table->double('sale_price')->nullable();           
            $table->integer('discount')->nullable(); 
            $table->string('author')->nullable();
            $table->string('code')->nullable();
            $table->string('publishing_year')->nullable();
            $table->boolean('status')->default(false);
                $table->boolean('featured')->default(false);        
            $table->timestamps();
            $table->softDeletes(); 

            // Thêm khóa ngoại với ràng buộc ON DELETE CASCADE
            $table->foreignId('id_publisher')->constrained('table_publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_product');
    }
};
