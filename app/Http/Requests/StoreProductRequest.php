<?php

namespace App\Http\Requests;

use App\Enums\ProductType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // For now, we'll allow anyone. In a real app, you might check roles.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productType = $this->input('type');

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'type' => ['required', Rule::enum(ProductType::class)],
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',

            // Rules for SIMPLE products
            'price' => ['required_if:type,' . ProductType::SIMPLE->value, 'numeric', 'min:0'],
            'sku' => ['required_if:type,' . ProductType::SIMPLE->value, 'string', 'max:255', 'unique:products,sku'],
            'stock_quantity' => ['required_if:type,' . ProductType::SIMPLE->value, 'integer', 'min:0'],

            // Rules for VARIABLE products
            'variations' => ['required_if:type,' . ProductType::VARIABLE->value, 'array', 'min:1'],
            'variations.*.sku' => 'required|string|max:255|distinct|unique:product_variations,sku',
            'variations.*.price' => 'required|numeric|min:0',
            'variations.*.stock_quantity' => 'required|integer|min:0',
            'variations.*.image' => 'nullable|string|max:255',
            'variations.*.attributes' => 'required|array|min:1', // e.g., [1, 5] (attribute_value_ids)
            'variations.*.attributes.*' => 'required|integer|exists:attribute_values,id',
        ];
    }
}