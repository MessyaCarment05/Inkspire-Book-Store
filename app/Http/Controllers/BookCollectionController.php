<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
class BookCollectionController extends Controller
{
    public function indexBookCollection(){
        $books=Book::all();
        $categories=Category::all();
        return view('bookcollection', compact('books', 'categories'));
    }
}
