<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\BookCollectionController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\UserProfileController;
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

Route::middleware('auth')->group(function () {
    
    // User Profile
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('user.edit');
    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.updateProfile');
    Route::post('/profile/update-password', [UserProfileController::class, 'updatePassword'])->name('user.UpdatePassword');
     
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
    // Contact Us
    Route::get('/contactus', function () {
        return view('contactus');
    });



  
  



});

require __DIR__.'/auth.php';
