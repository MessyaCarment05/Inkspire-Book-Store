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
        Schema::create('receipts', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('receipt_user_id');
            $table->unsignedBigInteger('receipt_category_id');
            $table->unsignedBigInteger('receipt_book_id');
            $table->foreign('receipt_category_id')->references('id')->on('categories');
            $table->string('receipt_book_image');
            $table->string('receipt_book_title');
            $table->string('receipt_book_author');
            $table->integer('receipt_book_price');
            $table->integer('receipt_book_quantity');
            $table->string('receipt_book_description');
            $table->string('payment_method');
            $table->uuid('transaction_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
