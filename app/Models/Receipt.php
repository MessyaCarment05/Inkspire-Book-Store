<?php

// app/Models/Receipt.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model {
    use HasFactory;
    protected $table = "receipts";
    protected $fillable = [
        'receipt_user_id',
        'receipt_category_id',
        'receipt_book_id',
        'receipt_book_image',
        'receipt_book_title',
        'receipt_book_author',
        'receipt_book_price',
        'receipt_book_quantity',
        'receipt_book_description',
        'payment_method',
        'transaction_id',
    ];
    

    public function category() {
        return $this->belongsTo(Category::class, 'receipt_category_id');
    }
}
