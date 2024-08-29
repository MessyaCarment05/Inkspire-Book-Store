<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table="books";
    protected $fillable=[
        'category_id',
        'book_image',
        'book_title',
        'book_author',
        'book_price',
        'book_quantity',
        'book_description'
    ];
    // buat ambil category_name nya based on catagory_id
    public function category(){
        return  $this->belongsTo(Category::class, 'category_id');
    }
}
