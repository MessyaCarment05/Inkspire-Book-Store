<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCollectionController;
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
    
});

require __DIR__.'/auth.php';
