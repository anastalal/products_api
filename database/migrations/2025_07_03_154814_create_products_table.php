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
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['simple', 'variable'])->default('simple');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->nullable(); // For simple products
            $table->string('sku')->nullable()->unique(); // For simple products
            $table->unsignedInteger('stock_quantity')->nullable(); // For simple products
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('ai_suggested')->default(false);
            $table->index('slug');
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
