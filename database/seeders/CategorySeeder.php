<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Default categories
        $categories = [
            ['name' => 'Food', 'chinese_name' => '食品', 'parent_id' => 0],
            ['name' => 'Beverages', 'chinese_name' => '饮料', 'parent_id' => 0],
            ['name' => 'Snacks', 'chinese_name' => '零食', 'parent_id' => 0],
            ['name' => 'Fruits', 'chinese_name' => '水果', 'parent_id' => 1],
            ['name' => 'Vegetables', 'chinese_name' => '蔬菜', 'parent_id' => 1],
            ['name' => 'Soft Drinks', 'chinese_name' => '软饮料', 'parent_id' => 2],
            ['name' => 'Alcoholic Drinks', 'chinese_name' => '酒精饮料', 'parent_id' => 2],
            ['name' => 'Chips', 'chinese_name' => '薯片', 'parent_id' => 3],
            ['name' => 'Cookies', 'chinese_name' => '饼干', 'parent_id' => 3],
            ['name' => 'Candy', 'chinese_name' => '糖果', 'parent_id' => 3],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
