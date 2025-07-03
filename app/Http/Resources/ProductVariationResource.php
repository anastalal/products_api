<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'price' => $this->price,
            'stock' => $this->stock_quantity,
            'image' => $this->image,
            'attributes' => AttributeValueResource::collection($this->whenLoaded('attribute_values')),
        ];
    }
}