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
        Schema::create('product_sellers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('price')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('discount')->nullable()->default(0);
            $table->boolean('featured')->nullable()->default(false);
            $table->timestamp('discount_duration')->nullable();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('seller_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sellers');
    }
};
