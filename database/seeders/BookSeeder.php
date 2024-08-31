<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Ambil ID dari Category yang sudah dibuat di CategorySeeder untuk mengambil category_name nya
        $science=Category::where('category_name', 'Science')->first()->id;
        $aerospace=Category::where('category_name', 'Aerospace')->first()->id;
        $literature=Category::where('category_name', 'Literature')->first()->id;
        $psychology=Category::where('category_name', 'Psychology')->first()->id;
        $business=Category::where('category_name', 'Business')->first()->id;
        $accounting=Category::where('category_name', 'Accounting')->first()->id;
        $marketing=Category::where('category_name', 'Marketing')->first()->id;
        $database=Category::where('category_name', 'Database')->first()->id;
        $technology=Category::where('category_name', 'Technology')->first()->id;
        $economics=Category::where('category_name', 'Economics')->first()->id;

        // Input Book ke dalam database secara manual
        // Buku 1
        Book::create([
            'category_id' => $science,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Introduction to Science',
            'book_author' => 'Author A',
            'book_price' => 120000,
            'book_quantity' => 10,
            'book_description' => 'A comprehensive guide to the fundamentals of science.',
        ]);
        //Buku 2
        Book::create([
            'category_id' => $aerospace,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Aerospace Engineering Basics',
            'book_author' => 'Author B',
            'book_price' => 150000,
            'book_quantity' => 5,
            'book_description' => 'An introduction to aerospace engineering concepts.',
        ]);
        //Buku 3
        Book::create([
            'category_id' => $literature,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Modern Literature',
            'book_author' => 'Author C',
            'book_price' => 110000,
            'book_quantity' => 15,
            'book_description' => 'A study of modern literary works and their impact.',
        ]);
          //Buku 4
        Book::create([
            'category_id' => $psychology,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Understanding Psychology',
            'book_author' => 'Author D',
            'book_price' => 130000,
            'book_quantity' => 8,
            'book_description' => 'An introduction to psychological theories and practices.',
        ]);
         //Buku 5
        Book::create([
            'category_id' => $business,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Business Management Essentials',
            'book_author' => 'Author E',
            'book_price' => 140000,
            'book_quantity' => 12,
            'book_description' => 'Key principles of effective business management.',
        ]);
        //Buku 6
        Book::create([
            'category_id' => $accounting,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Principles of Accounting',
            'book_author' => 'Author F',
            'book_price' => 125000,
            'book_quantity' => 6,
            'book_description' => 'Fundamentals of accounting and financial reporting.',
        ]);
        //Buku 7
        Book::create([
            'category_id' => $marketing,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Marketing Strategies',
            'book_author' => 'Author G',
            'book_price' => 160000,
            'book_quantity' => 10,
            'book_description' => 'Effective strategies for successful marketing campaigns.',
        ]);
        //Buku 8
        Book::create([
            'category_id' => $database,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Database Management Systems',
            'book_author' => 'Author H',
            'book_price' => 170000,
            'book_quantity' => 7,
            'book_description' => 'Comprehensive overview of database management systems.',
        ]);
        //Buku 9
        Book::create([
            'category_id' => $technology,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Technology Innovations',
            'book_author' => 'Author I',
            'book_price' => 180000,
            'book_quantity' => 14,
            'book_description' => 'Exploration of recent technological innovations.',
        ]);
        //Buku 10
        Book::create([
            'category_id' => $economics,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Economics 101',
            'book_author' => 'Author J',
            'book_price' => 140000,
            'book_quantity' => 9,
            'book_description' => 'Basic principles of economics and their applications.',
        ]);
        //Buku 11
        Book::create([
            'category_id' => $science,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Advanced Science Concepts',
            'book_author' => 'Author K',
            'book_price' => 190000,
            'book_quantity' => 8,
            'book_description' => 'In-depth exploration of advanced science topics.',
        ]);
        //Buku 12
        Book::create([
            'category_id' => $aerospace,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Space Exploration Technologies',
            'book_author' => 'Author L',
            'book_price' => 200000,
            'book_quantity' => 4,
            'book_description' => 'Technologies and advancements in space exploration.',
        ]);
        //Buku 13
        Book::create([
            'category_id' => $literature,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Classic Literary Works',
            'book_author' => 'Author M',
            'book_price' => 110000,
            'book_quantity' => 11,
            'book_description' => 'Analysis of classic works of literature.',
        ]);
        //Buku 14
        Book::create([
            'category_id' => $psychology,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Cognitive Behavioral Therapy',
            'book_author' => 'Author N',
            'book_price' => 155000,
            'book_quantity' => 6,
            'book_description' => 'Techniques and theories in cognitive behavioral therapy.',
        ]);
        //Buku 15
        Book::create([
            'category_id' => $business,
            'book_image' => 'pics/book1.png',
            'book_title' => 'Entrepreneurship and Innovation',
            'book_author' => 'Author O',
            'book_price' => 165000,
            'book_quantity' => 9,
            'book_description' => 'Principles of entrepreneurship and innovative thinking.',
        ]);

       
        
        
    }
}
// 'category_id',
//         'book_image',
//         'book_title',
//         'book_author',
//         'book_price',
//         'book_quantity',
//         'book_description'