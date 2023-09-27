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
            $table->string('title');
            $table->text('description');
            $table->string('author');
            $table->unsignedBigInteger('pages_num');
            $table->decimal('price',10);
            $table->decimal('discount', 10);
            $table->decimal('price_after_discount', 10);
            $table->decimal('quantity', 10);
            $table->boolean('available');
            $table->string('image');
            $table->string('product_code');
            $table->foreignId('category_id')->nullable()->constrained('categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
