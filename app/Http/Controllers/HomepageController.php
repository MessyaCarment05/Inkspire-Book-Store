<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function indexHomepage(){
        $books=Book::all();
        $categories=Category::all();
        return view('homepage', compact('books', 'categories'));
    }
}
