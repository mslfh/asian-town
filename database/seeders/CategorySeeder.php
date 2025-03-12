<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Seed the categories table with 10 categories
        Category::factory()->count(10)->create();
    }
}
