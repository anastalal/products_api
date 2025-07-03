<?php

namespace Database\Factories;

use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttributeValue>
 */
class AttributeValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $value = fake()->word();
        return [
            'attribute_id' => Attribute::factory(),
            'value' => $value,
            'slug' => Str::slug($value)
        ];
    }
}
