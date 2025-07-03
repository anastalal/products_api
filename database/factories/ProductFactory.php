<?php

namespace Database\Factories;

use App\Enums\ProductType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(3, true);
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'type' => ProductType::SIMPLE, // القيمة الافتراضية
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 100),
            'sku' => 'SKU-' . fake()->unique()->numberBetween(1000, 9999),
            'stock_quantity' => fake()->numberBetween(0, 100),
           'image' => fake()->imageUrl(640, 480, 'products', true),
            'is_featured' => fake()->boolean(25), // 25% chance of being true
            'is_active' => true,
        ];
    }

     public function variable(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => ProductType::VARIABLE,
                'price' => null,
                'sku' => null,
                'stock_quantity' => null,
            ];
        });
    }
}
