<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Function untuk menampilkan semua kategori
    public function showCategory(){
        $categories = Category ::all(); // ini untuk mengambil semua kategori yang ada di database
        return view('homepage', compact('categories'));
    }
}
