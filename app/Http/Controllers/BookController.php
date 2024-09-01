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
    public function addCart(Request $request, $id)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $book = Book::findOrFail($id);

            // Check if the book is already in the cart
            $cart = Cart::where('cart_user_id', $user->id)
                        ->where('cart_category_id', $book->category_id)
                        ->first();

            if ($cart) {
                // If the book is already in the cart, increase the quantity
                $cart->cart_book_quantity += 1;
            } else {
                // If the book is not in the cart, create a new cart item
                $cart = new Cart();
                $cart->cart_user_id = $user->id;
                $cart->cart_category_id = $book->category_id;
                $cart->cart_book_image = $book->book_image;
                $cart->cart_book_title = $book->book_title;
                $cart->cart_book_author = $book->book_author;
                $cart->cart_book_price = $book->book_price;
                $cart->cart_book_quantity = 1;  // Start with quantity 1
                $cart->cart_book_description = $book->book_description;
            }

            // Save the cart item
            $cart->save();

            return redirect()->back()->with('message', 'Book added successfully');
        }

        return redirect()->route('login')->with('message', 'Please log in to add items to the cart');
    }

  
    public function showCart() {
        $cart = Cart::with('category')->where('cart_user_id', auth()->id())->get();
        return view('cart', compact('cart'));
    }

}
