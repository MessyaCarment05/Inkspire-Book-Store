<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Receipt;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    
    public function addCheckout(Request $request, $id)
    {
       
        if (Auth::check()) {
            try {
                $user = auth()->user();
                $cart = Cart::findOrFail($id);
    
                // Check if the item is already in the checkout
                $checkout = Checkout::where('checkout_user_id', $user->id)
                            ->where('checkout_book_title', $cart->cart_book_title)
                            ->first();
    
                if ($checkout) {
                    // If item is already in the checkout, update the quantity
                    $checkout->checkout_book_quantity += $cart->cart_book_quantity;
                } else {
                    // Otherwise, create a new checkout entry
                    $checkout = new Checkout();
                    $checkout->checkout_user_id = $cart->cart_user_id;
                    $checkout->checkout_book_id = $cart->cart_book_id;
                    $checkout->checkout_category_id = $cart->cart_category_id;
                    $checkout->checkout_book_image = $cart->cart_book_image;
                    $checkout->checkout_book_title = $cart->cart_book_title;
                    $checkout->checkout_book_author = $cart->cart_book_author;
                    $checkout->checkout_book_price = $cart->cart_book_price;
                    $checkout->checkout_book_quantity = $cart->cart_book_quantity;
                    $checkout->checkout_book_description = $cart->cart_book_description;
                }
    
                if (!$checkout->save()) {
                    throw new \Exception('Failed to save item to checkout');
                }
    
                // Remove the item from the cart
                $cart->delete();
    
                // Redirect to the checkout page with updated list
                return redirect()->route('showCheckout')->with('success', 'Successfully checked out!');
            } catch (\Exception $e) {
                // Handle specific error scenarios
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    
        return redirect()->route('login')->with('message', 'Please log in to add items to the cart');
    }
    
    
    public function showCheckout() {
        $checkout = Checkout::with('category')->where('checkout_user_id', auth()->id())->get();
        return view('checkoutpage', compact('checkout'));
    }

    public function removeFromCheckout(Request $request, $id)
    {
        if (Auth::check()) {
            try {
                $user = auth()->user();
        
                // Cari item checkout berdasarkan ID
                $checkout = Checkout::findOrFail($id);
        
                // Tambahkan kembali ke cart
                $cart = Cart::where('cart_user_id', $user->id)
                            ->where('cart_book_title', $checkout->checkout_book_title)
                            ->first();
        
                if ($cart) {
                    // Jika item sudah ada di cart, tambahkan quantity
                    $cart->cart_book_quantity += $checkout->checkout_book_quantity;
                } else {
                    // Tambahkan item baru ke cart
                    $cart = new Cart();
                    $cart->cart_user_id = $checkout->checkout_user_id;
                    $cart->cart_category_id = $checkout->checkout_category_id;
                    $cart->cart_book_id = $checkout->checkout_book_id;
                    $cart->cart_book_title = $checkout->checkout_book_title;
                    $cart->cart_book_author = $checkout->checkout_book_author;
                    $cart->cart_book_price = $checkout->checkout_book_price;
                    $cart->cart_book_quantity = $checkout->checkout_book_quantity;
                    $cart->cart_book_image = $checkout->checkout_book_image;
                    $cart->cart_book_description = $checkout->checkout_book_description;
                }
        
                // Simpan item ke cart
                if (!$cart->save()) {
                    throw new \Exception('Gagal menambahkan item ke cart');
                }
        
                // Hapus item dari checkout
                if (!$checkout->delete()) {
                    throw new \Exception('Gagal menghapus item dari checkout');
                }
        
                return redirect()->back()->with('success', 'Item berhasil dipindahkan kembali ke cart dan dihapus dari checkout.');
        
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

        return redirect()->route('login')->with('message', 'Harap login untuk melanjutkan.');
    }
    
    
}
