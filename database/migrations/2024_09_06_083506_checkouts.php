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
        Schema::create('checkouts', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('checkout_user_id');
            $table->unsignedBigInteger('checkout_category_id');
            $table->unsignedBigInteger('checkout_book_id');
            $table->foreign('checkout_category_id')->references('id')->on('categories');
            $table->string('checkout_book_image');
            $table->string('checkout_book_title');
            $table->string('checkout_book_author');
            $table->integer('checkout_book_price');
            $table->integer('checkout_book_quantity');
            $table->string('checkout_book_description');
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
