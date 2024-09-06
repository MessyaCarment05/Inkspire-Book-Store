<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table="carts";
    protected $fillable=[

        'cart_user_id',
        'cart_book_id',
        'cart_category_id',
        'cart_book_image',
        'cart_book_title',
        'cart_book_author',
        'cart_book_price',
        'cart_book_quantity',
        'cart_book_description'
    ];
    // buat ambil category_name nya based on catagory_id
    public function category(){
        return  $this->belongsTo(Category::class, 'cart_category_id');
    }
}
