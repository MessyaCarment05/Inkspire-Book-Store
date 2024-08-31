<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Cart;
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
    public function addCart(Request $request, $id){
        if((Auth::id())){
            $user=auth()->user();
            $book=Book::findOrFail($id);
            $cart= new Cart();
            $cart->cart_user_id=$user->id;
            $cart->cart_category_id=$book->category_id;
            $cart->cart_book_image=$book->book_image;
            $cart->cart_book_title=$book->book_title;
            $cart->cart_book_author=$book->book_author;
            $cart->cart_book_price=$book->book_price;
            $cart->cart_book_quantity=$book->book_quantity;
            $cart->cart_book_description=$book->book_description;
            $cart->save();
            return redirect()->back()->with('message', 'Book added successfully');
          

        }
    }
  
    public function showCart() {
        $cart = Cart::with('category')->where('cart_user_id', auth()->id())->get();
        return view('cart', compact('cart'));
    }

}
