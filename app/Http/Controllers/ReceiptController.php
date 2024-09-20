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
use Illuminate\Support\Facades\Log;


class ReceiptController extends Controller
{
    
    public function store(Request $request)
    {
        // dd('Store function is executed');
        $user_id = auth()->id(); // Ambil ID user yang sedang login
        $checkoutItems = Checkout::where('checkout_user_id', $user_id)->get(); // Ambil semua item checkout untuk user ini
        print($checkoutItems);
        // Buat transaksi ID yang unik
        $transaction_id = uniqid('trans_');

        foreach ($checkoutItems as $checkout) {
            Receipt::create([
                'receipt_user_id' => $user_id,
                'receipt_category_id' => $checkout->checkout_category_id,
                'receipt_book_id' => $checkout->checkout_book_id,
                'receipt_book_image' => $checkout->checkout_book_image,
                'receipt_book_title' => $checkout->checkout_book_title,
                'receipt_book_author' => $checkout->checkout_book_author,
                'receipt_book_price' => $checkout->checkout_book_price,
                'receipt_book_quantity' => $checkout->checkout_book_quantity,
                'receipt_book_description' => $checkout->checkout_book_description,
                'payment_method' => $request->input('payment_method'),
                'transaction_id' => $transaction_id, // Gunakan ID transaksi yang sama untuk semua item
            ]);
        }

        // Hapus item dari tabel checkout setelah sukses menyimpan ke receipt
        Checkout::where('checkout_user_id', $user_id)->delete();

        // Redirect atau return view sesuai kebutuhan
        return redirect()->route('showReceipt', ['transaction_id' => $transaction_id]); // Ganti dengan route yang sesuai
    }

    
    public function showReceipt($transaction_id)
    {
        // Get receipt items berdasarkan transaction_id
        $receipts = Receipt::where('transaction_id', $transaction_id)->get();

        if ($receipts->isEmpty()) {
            return redirect()->back()->with('error', 'No receipt found!');
        }

           
        $payment_method = $receipts->first()->payment_method;

        return view('receiptpage', [
            'receipts' => $receipts,
            'transaction_id' => $transaction_id,
            'payment_method' => $payment_method // Tambahkan payment_method di sini
        ]);
    }
    
}
