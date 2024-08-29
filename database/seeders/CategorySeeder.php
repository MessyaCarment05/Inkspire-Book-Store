<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Buat categorynya
    public function run(): void
    {
        Category::create(['category_name' => 'Science']);
        Category::create(['category_name' => 'Aerospace']);
        Category::create(['category_name' => 'Literature']);
        Category::create(['category_name' => 'Psychology']);
        Category::create(['category_name' => 'Business']);
        Category::create(['category_name' => 'Accounting']);
        Category::create(['category_name' => 'Marketing']);
        Category::create(['category_name' => 'Database']);
        Category::create(['category_name' => 'Technology']);
        Category::create(['category_name' => 'Economics']);
    }
}
