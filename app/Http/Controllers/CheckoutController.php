<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Checkout;
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
                    $checkout->checkout_book_id = $cart->id;
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

    public function removeFromCheckout($id)
    {
        if (Auth::check()) {
            try {
                $user = auth()->user();
                $checkout = Checkout::findOrFail($id);
    
                // Create a new cart entry with the details from the checkout
                $cart = new Cart();
                $cart->cart_user_id = $user->id;
                $cart->cart_category_id = $checkout->checkout_category_id;
                $cart->cart_book_image = $checkout->checkout_book_image;
                $cart->cart_book_title = $checkout->checkout_book_title;
                $cart->cart_book_author = $checkout->checkout_book_author;
                $cart->cart_book_price = $checkout->checkout_book_price;
                $cart->cart_book_quantity = $checkout->checkout_book_quantity;
                $cart->cart_book_description = $checkout->checkout_book_description;
    
                if (!$cart->save()) {
                    throw new \Exception('Failed to add item back to cart');
                }
    
                // Delete the item from the checkout
                $checkout->delete();
    
                // Redirect back to checkout page with a success message
                return redirect()->route('showCheckout')->with('success', 'Item has been moved back to cart.');
            } catch (\Exception $e) {
                // Handle specific error scenarios
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    
        return redirect()->route('login')->with('message', 'Please log in to manage your checkout items');
    }
    
}
