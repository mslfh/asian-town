<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('main_name');
            $table->string('chinese_name')->nullable();

            $table->string('barcode')->nullable();

            $table->text('image_url')->nullable();
            $table->text('image_url_extra')->nullable();

            $table->integer('status')->default(0); //1-active, 0-inactive, 2-deleted

            $table->integer('type')->nullable();//1-店售 2-仓库 3-店售+仓库
            $table->string('brand')->nullable();

            $table->integer('category_id')->nullable();
            $table->string('category')->nullable();

            $table->integer('unit_id')->nullable();
            $table->string('unit')->nullable();

            $table->text('description')->nullable();
            $table->decimal('cost_price', 8, 2)->nullable();
            $table->decimal('retail_price', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
