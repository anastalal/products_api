<?php
namespace App\Http\Resources;
use App\Enums\ProductType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // Eager load relations if not already loaded
        $this->loadMissing(['product_variations.attribute_values.attribute']);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'image' => $this->image,
            'description' => $this->description,
            'is_featured' => $this->is_featured,
            'is_active' => $this->is_active,
            
            
            // Show these fields only for simple products
            'price' => $this->when($this->type === ProductType::SIMPLE, $this->price),
            'sku' => $this->when($this->type === ProductType::SIMPLE, $this->sku),
            'stock' => $this->when($this->type === ProductType::SIMPLE, $this->stock_quantity),

            // Show variations only for variable products
            'variations' => $this->when($this->type === ProductType::VARIABLE, 
                ProductVariationResource::collection($this->product_variations)
            ),
            
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}