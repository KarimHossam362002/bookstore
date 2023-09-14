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
        Schema::create('product_wishlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wishlist_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity')->default(1);
            $table->foreign('wishlist_id')->references('id')->on('wishlists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_wishlist');
    }
};
