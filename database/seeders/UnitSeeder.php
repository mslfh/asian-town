<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         // Insert basic data
         $units = [
            ['title' => 'Piece', 'chinese_title' => '件', 'norm' => 'pcs'],
            ['title' => 'Kilogram', 'chinese_title' => '千克', 'norm' => 'kg'],
            ['title' => 'Liter', 'chinese_title' => '升', 'norm' => 'L'],
            ['title' => 'Box', 'chinese_title' => '箱', 'norm' => '24pcs'],
            ['title' => 'Bag', 'chinese_title' => '袋', 'norm' => '10kg']
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
