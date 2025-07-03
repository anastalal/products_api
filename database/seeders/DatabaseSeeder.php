<?php

namespace Database\Seeders;

use App\Enums\ProductType;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        Attribute::truncate();
        AttributeValue::truncate();
        ProductVariation::truncate();
        DB::table('attribute_value_product_variation')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. إنشاء السمات وقيمها
        $attributeColor = Attribute::factory()->create(['name' => 'Color', 'slug' => 'color']);
        $colorValues = collect(['Red', 'Green', 'Blue'])->map(fn ($color) => 
            AttributeValue::factory()->create([
                'attribute_id' => $attributeColor->id, 
                'value' => $color, 
                'slug' => strtolower($color)
            ])
        );

        $attributeSize = Attribute::factory()->create(['name' => 'Size', 'slug' => 'size']);
        $sizeValues = collect(['Small', 'Medium', 'Large'])->map(fn ($size) => 
            AttributeValue::factory()->create([
                'attribute_id' => $attributeSize->id, 
                'value' => $size, 
                'slug' => strtolower($size)
            ])
        );

        // 3. إنشاء منتجات بسيطة
        Product::factory(10)->create();

        // 4. إنشاء منتجات متغيرة مع متغيراتها
        Product::factory(5)->variable()->create()->each(function ($product) use ($colorValues, $sizeValues) {

            $randomColors = $colorValues->random(2);
            $randomSizes = $sizeValues->random(2);

            foreach ($randomColors as $color) {
                foreach ($randomSizes as $size) {
                    $variation = ProductVariation::factory()->create([
                        'product_id' => $product->id,
                        'price' => rand(20, 100),
                        'stock_quantity' => rand(5, 50),
                    ]);
                    
                    // ربط المتغير بقيم السمات (اللون والحجم)
                    $variation->attribute_values()->attach([$color->id, $size->id]);
                }
            }
        });
    }
}