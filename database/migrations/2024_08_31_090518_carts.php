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
        Schema::create('carts', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('cart_user_id');
            $table->unsignedBigInteger('cart_category_id');
            $table->unsignedBigInteger('cart_book_id');
            $table->foreign('cart_category_id')->references('id')->on('categories');
            $table->string('cart_book_image');
            $table->string('cart_book_title');
            $table->string('cart_book_author');
            $table->integer('cart_book_price');
            $table->integer('cart_book_quantity');
            $table->string('cart_book_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
