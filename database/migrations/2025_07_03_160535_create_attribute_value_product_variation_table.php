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
        Schema::create('attribute_value_product_variation', function (Blueprint $table) {
            $table->primary(['attribute_value_id', 'product_variation_id']); // Composite Primary Key
            $table->foreignId('attribute_value_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_variation_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_value_product_variation');
    }
};
