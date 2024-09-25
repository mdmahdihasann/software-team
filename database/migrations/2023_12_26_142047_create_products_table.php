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
        Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
                $table->string('product_title')->nullable();
                $table->longText('product_description')->nullable();
                $table->string('product_quantity')->nullable();
                $table->string('discount_price')->nullable();
                $table->string('price')->nullable();
                $table->string('image')->nullable();
                $table->string('product_tag')->nullable();
                $table->enum('status',[1,2])->default(2)->comment('1=publish, 2=pending');
                $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
