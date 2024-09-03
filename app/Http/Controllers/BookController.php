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
        try {
            $user = auth()->user();
            $book = Book::findOrFail($id);

            // Periksa apakah quantity buku tersedia
            if ($book->book_quantity <= 0) {
                return redirect()->back()->with('message', 'This book is out of stock');
            }

            // Periksa apakah buku sudah ada di cart
            $cart = Cart::where('cart_user_id', $user->id)
                        ->where('cart_book_title', $book->book_title)
                        ->first();

            if ($cart) {
                // Jika buku sudah ada di cart, tambahkan quantity
                $cart->cart_book_quantity += 1;
            } else {
                // Jika buku belum ada di cart, buat item baru
                $cart = new Cart();
                $cart->cart_user_id = $user->id;
                $cart->cart_category_id = $book->category_id;
                $cart->cart_book_image = $book->book_image;
                $cart->cart_book_title = $book->book_title;
                $cart->cart_book_author = $book->book_author;
                $cart->cart_book_price = $book->book_price;
                $cart->cart_book_quantity = 1;  // Mulai dengan quantity 1
                $cart->cart_book_description = $book->book_description;
            }

            // Simpan item di cart dan periksa apakah berhasil
            if (!$cart->save()) {
                throw new \Exception('Failed to save item to cart');
            }

            // Kurangi quantity buku dan periksa apakah berhasil
            $book->book_quantity -= 1;
            if (!$book->save()) {
                throw new \Exception('Failed to reduce book quantity');
            }

            return redirect()->back()->with('message', 'Book added to cart successfully');
        } catch (\Exception $e) {
            // Handle specific error scenarios
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    return redirect()->route('login')->with('message', 'Please log in to add items to the cart');
}

  
    public function showCart() {
        $cart = Cart::with('category')->where('cart_user_id', auth()->id())->get();
        return view('cart', compact('cart'));
    }

}
