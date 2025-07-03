<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Product Management
 *
 * APIs for creating, reading, updating, and deleting products.
 * This includes handling both simple and variable products.
 */
class ProductController extends ApiController 
{
    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * ProductController constructor.
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * List Products
     *
     * Retrieves a paginated list of products.
     * You can filter the results by name, type, and price range.
     *
     * @queryParam name string Partial name to search for. Example: "Awesome T-Shirt"
     * @queryParam type string Filter by product type. Enum: simple,variable Example: variable
     * @queryParam min_price number Minimum price for the product or any of its variations. Example: 10.50
     * @queryParam max_price number Maximum price for the product or any of its variations. Example: 99.99
     * @queryParam per_page integer Number of items per page. Defaults to 15. Example: 20
     * 
     * @responseFile storage/app/public/responses/products.index.json
     */
    public function index(Request $request): JsonResponse
    {
        // We pass all query parameters to our service method
        $products = $this->productService->getFilteredProducts($request->query());
            
        return $this->successResponse(
            // Use the resource collection as before
            ProductResource::collection($products)->response()->getData(true),
            'success.'
        );
    }

    /**
     * Create Product
     *
     * Creates a new product.
     * For a 'simple' product, provide `price`, `sku`, and `stock_quantity`.
     * For a 'variable' product, provide an array of `variations`.
     *
     * @bodyParam name string required The name of the product. Example: "Cool T-Shirt"
     * @bodyParam slug string required A unique slug for the product URL. Example: "cool-t-shirt"
     * @bodyParam type string required The type of product. Enum: simple,variable Example: "variable"
     * @bodyParam description string A description for the product.
     * @bodyParam image string URL for the main product image.
     * @bodyParam is_featured boolean Whether the product is featured. Defaults to false. Example: true
     * @bodyParam is_active boolean Whether the product is active. Defaults to true. Example: true
     * 
     * @bodyParam price number The price of the product. Required if `type` is 'simple'. Example: 49.99
     * @bodyParam sku string The SKU of the product. Required if `type` is 'simple'. Example: "TS-BLK-L"
     * @bodyParam stock_quantity integer The stock quantity. Required if `type` is 'simple'. Example: 100
     * 
     * @bodyParam variations array The variations for the product. Required if `type` is 'variable'.
     * @bodyParam variations[].sku string required The unique SKU for this variation. Example: "V-TS-BL-LG"
     * @bodyParam variations[].price number required The price for this variation. Example: 55.00
     * @bodyParam variations[].stock_quantity integer required The stock quantity for this variation. Example: 50
     * @bodyParam variations[].image string An optional image URL for this specific variation.
     * @bodyParam variations[].attributes integer[] required An array of `attribute_value_id`s that define this variation. Example: [1, 5]
     *
     * @responseFile 201 storage/app/public/responses/product.show.json
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        // The request is already validated by StoreProductRequest
        $product = $this->productService->createProduct($request->validated());

        return $this->successResponse(
            new ProductResource($product),
            'success.',
            Response::HTTP_CREATED
        );
    }

    /**
     * Get Product Details
     *
     * Retrieves the details of a specific product, including its variations if applicable.
     *
     * @urlParam product integer required The ID of the product. Example: 1
     *
     * @responseFile storage/app/public/responses/product.show.json
     */
    public function show(Product $product): JsonResponse
    {
        // The product is automatically fetched via Route Model Binding.
        // The resource will handle loading necessary relations.
        return $this->successResponse(
            new ProductResource($product),
            'success'
        );
    }

    /**
     * Update Product
     *
     * Updates an existing product's details. When updating a variable product, you can add,
     * update, or remove variations. To update a variation, include its `id`. To add a new one, omit the `id`.
     * Any existing variations not included in the request will be deleted.
     *
     * @urlParam product integer required The ID of the product to update. Example: 2
     *
     * @bodyParam variations[].id integer The ID of an existing variation to update. Omit to create a new one. Example: 10
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        // The request is validated, and the product is fetched.
        $updatedProduct = $this->productService->updateProduct($product, $request->validated());

        return $this->successResponse(
            new ProductResource($updatedProduct),
            'success.'
        );
    }

    /**
     * Delete Product
     *
     * Deletes a product and all of its associated variations permanently.
     *
     * @urlParam product integer required The ID of the product to delete. Example: 1
     *
     * @response 200 {"success": true, "message": "Product deleted successfully.", "data": []}
     * @response 404 {"success": false, "message": "The requested product was not found."}
     */
    public function destroy(Product $product): JsonResponse
    {
        // ToDo: You might want to add a delete method in ProductService 
        // to handle any additional logic (like deleting images from storage).
        $product->delete();

        return $this->successResponse(
            [], // No data to return
            'success.',
            Response::HTTP_OK // Or HTTP_NO_CONTENT (204)
        );
    }
}