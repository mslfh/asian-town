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
        Schema::create('product_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // 关联商品
            $table->string('name'); // 活动名称
            $table->text('description')->nullable(); // 活动描述
            $table->timestamp('start_time')->nullable(); // 活动开始时间
            $table->timestamp('end_time')->nullable(); // 活动结束时间
            $table->enum('type', ['discount', 'gift', 'flash_sale']); // 活动类型 (折扣、赠品、限时特价)
            $table->decimal('discount_value', 10, 2)->nullable(); // 如果是折扣，存折扣值（如 10%）
            $table->integer('gift_product_id')->nullable(); // 如果是赠品，存赠品 ID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_events');
    }
};
