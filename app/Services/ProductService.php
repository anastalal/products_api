<?php

namespace App\Services;

use App\Enums\ProductType;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    /**
     * Create a new product.
     *
     * @param array $data
     * @return Product
     * @throws \Throwable
     */
    public function createProduct(array $data): Product
    {
        return DB::transaction(function () use ($data) {
            $productData = [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'type' => $data['type'],
                'description' => $data['description'] ?? null,
                'image' => $data['image'] ?? null,
                'is_featured' => $data['is_featured'] ?? false,
                'is_active' => $data['is_active'] ?? true,
            ];

            if ($data['type'] === ProductType::SIMPLE->value) {
                $productData['price'] = $data['price'];
                $productData['sku'] = $data['sku'];
                $productData['stock_quantity'] = $data['stock_quantity'];
            }
            
            $product = Product::create($productData);

            if ($product->type === ProductType::VARIABLE) {
                $this->syncVariations($product, $data['variations']);
            }

            return $product;
        });
    }

    /**
     * Update an existing product.
     *
     * @param Product $product
     * @param array $data
     * @return Product
     * @throws \Throwable
     */
    public function updateProduct(Product $product, array $data): Product
    {
        return DB::transaction(function () use ($product, $data) {
            $product->update($data);

            if ($product->type === ProductType::VARIABLE && isset($data['variations'])) {
                $this->syncVariations($product, $data['variations']);
            }

            return $product->fresh(); // Return the fresh model with relations
        });
    }
    
    /**
     * Syncs product variations (creates, updates, deletes).
     *
     * @param Product $product
     * @param array $variationsData
     */
    protected function syncVariations(Product $product, array $variationsData): void
    {
        $existingVariationIds = $product->product_variations()->pluck('id')->all();
        $incomingVariationIds = collect($variationsData)->pluck('id')->filter()->all();
        
        // Delete variations that are not in the incoming data
        $idsToDelete = array_diff($existingVariationIds, $incomingVariationIds);
        if (!empty($idsToDelete)) {
            $product->product_variations()->whereIn('id', $idsToDelete)->delete();
        }

        // Create or Update variations
        foreach ($variationsData as $variationData) {
            $variation = $product->product_variations()->updateOrCreate(
                ['id' => $variationData['id'] ?? null], // Condition to find
                [ // Data to update or create
                    'sku' => $variationData['sku'],
                    'price' => $variationData['price'],
                    'stock_quantity' => $variationData['stock_quantity'],
                    'image' => $variationData['image'] ?? null,
                ]
            );

            // Sync attributes for this variation
            if (isset($variationData['attributes'])) {
                $variation->attribute_values()->sync($variationData['attributes']);
            }
        }
    }

    /**
     * Get a paginated list of products with filtering and sorting.
     *
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function getFilteredProducts(array $filters): LengthAwarePaginator
    {
        $query = Product::query()
            // Optimization: Eager load relations to prevent N+1 problem
            ->with(['product_variations.attribute_values.attribute']);

        // 1. Filtering by name (partial match)
        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        // 2. Filtering by type (simple/variable)
        if (!empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        // 3. Filtering by price range (min_price, max_price)
        // This is the most complex filter because it needs to check both
        // the base price (for simple products) and variation prices.
        $query->where(function (Builder $q) use ($filters) {
            
            // Filter by min_price
            if (!empty($filters['min_price'])) {
                $minPrice = (float) $filters['min_price'];
                
                // The product's own price is >= min_price (for simple products)
                // OR it has at least one variation with price >= min_price
                $q->where(function (Builder $subQ) use ($minPrice) {
                    $subQ->where('price', '>=', $minPrice)
                         ->orWhereHas('product_variations', function (Builder $varQ) use ($minPrice) {
                            $varQ->where('price', '>=', $minPrice);
                         });
                });
            }

            // Filter by max_price
            if (!empty($filters['max_price'])) {
                $maxPrice = (float) $filters['max_price'];
                
                // The product's own price is <= max_price (for simple products)
                // OR it has at least one variation with price <= max_price
                $q->where(function (Builder $subQ) use ($maxPrice) {
                    $subQ->where('price', '<=', $maxPrice)
                         ->orWhereHas('product_variations', function (Builder $varQ) use ($maxPrice) {
                            $varQ->where('price', '<=', $maxPrice);
                         });
                });
            }

        });

        // Default sorting
        $query->latest();

        // Paginate the results
        return $query->paginate($filters['per_page'] ?? 15);
    }
}