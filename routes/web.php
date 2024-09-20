<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BookCollectionController;
use App\Http\Controllers\ReceiptController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('splashscreen');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    // User Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Homepage Routes
    Route::get('/homepage', [HomepageController::class, 'indexHomepage']);
    // Book Detail Routes
    Route::get('/books/{id}', [BookController::class, 'showDetailBook'])->name('books.showDetail');
    // Book Collection Routes
    Route::get('/bookcollection', [BookCollectionController::class,'indexBookCollection']);
    // Add to Cart Routes
    Route::post('/add-cart/{id}', [BookController::class, 'addCart'])->name('add.cart');
    // Show Cart Routes
    Route::get('/cart', [BookController::class, 'showCart']);
    // Delete From Cart
    Route::delete('/cart/{id}/delete', [BookController::class, 'deleteFromCart'])->name('cart.delete');
    // Checkout Routes
    Route::post('/checkout/{id}', [CheckoutController::class, 'addCheckout'])->name('checkout.book');
    // Show Checkout Routes
    Route::get('/showCheckout', [CheckoutController::class, 'showCheckout'])->name('showCheckout');
    // Delete From Checkout
    Route::post('/checkout/remove/{id}', [CheckoutController::class, 'removeFromCheckout'])->name('checkout.remove');
    // Store Checkout Item
    Route::post('/store-receipt', [ReceiptController::class, 'store'])->name('storeReceipt');
    // Show Receipt
    Route::get('/receipt/{transaction_id}', [ReceiptController::class, 'showReceipt'])->name('showReceipt');



  
  



});

require __DIR__.'/auth.php';
