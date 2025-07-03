<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariation>
 */
class ProductVariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory()->variable(), // تأكد من أنه مرتبط بمنتج متغير
            'sku' => 'VAR-' . fake()->unique()->numberBetween(10000, 99999),
            'price' => fake()->randomFloat(2, 5, 90),
            'stock_quantity' => fake()->numberBetween(1, 50),
            'image' => fake()->imageUrl(640, 480, 'products', true),
        ];
    }
}
