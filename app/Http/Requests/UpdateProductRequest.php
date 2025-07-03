<?php

namespace App\Http\Requests;

use App\Enums\ProductType;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // $productId = $this->route('product')->id;
        // $productType = $this->input('type', $this->route('product')->type->value);

        return [
            'name' => 'sometimes|required|string|max:255',
            // Ignore the current product when checking for uniqueness
            'slug' => ['sometimes', 'required', 'string', 'max:255'],
            // 'slug' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('products')->ignore($productId)],
            // You generally don't allow changing a product's type after creation
            'type' => ['sometimes', 'required', Rule::enum(ProductType::class)],
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',

            // Rules for SIMPLE products
            'price' => ['required_if:type,' . ProductType::SIMPLE->value, 'numeric', 'min:0'],
            'sku' => ['required_if:type,' . ProductType::SIMPLE->value, 'string', 'max:255'],
            'stock_quantity' => ['required_if:type,' . ProductType::SIMPLE->value, 'integer', 'min:0'],

            // Rules for VARIABLE products
            // Updating variations is complex. We might handle creating, updating, and deleting.
            'variations' => ['sometimes', 'required_if:type,' . ProductType::VARIABLE->value, 'array'],
            // Example for updating existing variations (identified by ID)
            'variations.*.id' => 'nullable|integer|exists:product_variations,id',
            // Example for new variations (no ID)
            'variations.*.sku' => ['required', 'string', 'max:255', 'distinct', Rule::unique('product_variations', 'sku')->ignore($this->input('variations.*.id'))],
            'variations.*.price' => 'required|numeric|min:0',
            'variations.*.stock_quantity' => 'required|integer|min:0',
            'variations.*.attributes' => 'required|array|min:1',
            'variations.*.attributes.*' => 'required|integer|exists:attribute_values,id',
        ];
    }
}