<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table="checkouts";
    protected $fillable=[
        'checkout_user_id',
        'checkout_book_id',
        'checkout_category_id',
        'checkout_book_image',
        'checkout_book_title',
        'checkout_book_author',
        'checkout_book_price',
        'checkout_book_quantity',
        'checkout_book_description'
    ];
    // buat ambil category_name nya based on catagory_id
    public function category(){
        return  $this->belongsTo(Category::class, 'checkout_category_id');
    }
}
