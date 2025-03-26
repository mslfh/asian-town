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
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // 关联商品
            $table->decimal('discount_amount', 10, 2)->nullable(); // 固定折扣金额（如 -10.00）
            $table->decimal('discount_percentage', 5, 2)->nullable(); // 百分比折扣（如 10%）
            $table->timestamp('start_time')->nullable(); // 折扣开始时间
            $table->timestamp('end_time')->nullable(); // 折扣结束时间
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_discounts');
    }
};
