<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('chinese_title')->nullable();
            $table->string('norm')->nullable();
            $table->timestamps();
        });

        // Insert basic data
        DB::table('units')->insert([
            ['title' => 'Piece', 'chinese_title' => '件', 'norm' => 'pcs'],
            ['title' => 'Kilogram', 'chinese_title' => '千克', 'norm' => 'kg'],
            ['title' => 'Liter', 'chinese_title' => '升', 'norm' => 'L'],
            ['title' => 'Box', 'chinese_title' => '箱', 'norm' => '24pcs'],
            ['title' => 'Bag', 'chinese_title' => '袋', 'norm' => '10kg']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
