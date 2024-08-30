<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function indexBook(){
        $books=Book::all();
        return view('homepage', compact('books'));
    }
    public function showDetailBook($id){
        $bookdetail=Book::findOrFail($id);
        return view('seebookdetail', compact('bookdetail'));
    }
}
