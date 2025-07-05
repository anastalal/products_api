<?php

namespace Tests\Feature;

use App\Enums\ProductType;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsApiTest extends TestCase
{
    use RefreshDatabase; // This trait resets the database after each test
    use WithFaker;       // This trait provides access to the Faker library

    /**
     * Test: Can fetch a list of products.
     */
    public function test_it_can_fetch_a_list_of_products(): void
    {
        // 1. Arrange: Create some products in the database
        Product::factory(5)->create();

        // 2. Act: Make a GET request to the products index endpoint
        $response = $this->getJson('/api/products');

        // 3. Assert: Check the response
        $response->assertStatus(200)
                 ->assertJsonStructure([ // Check if the JSON structure is as expected
                     'success',
                     'message',
                     'data' => [
                         'data' => [
                             '*' => ['id', 'name', 'type']
                         ],
                         'links',
                         'meta'
                     ]
                 ])
                 ->assertJsonCount(5, 'data.data'); // Assert that we received 5 products
    }

    /**
     * Test: Can fetch a single product.
     */
    public function test_it_can_fetch_a_single_product(): void
    {
        // Arrange
        $product = Product::factory()->create();

        // Act
        $response = $this->getJson('/api/products/' . $product->id);

        // Assert
        $response->assertStatus(200)
                 ->assertJson([ // Check if the response data matches the created product
                     'success' => true,
                     'data' => [
                         'id' => $product->id,
                         'name' => $product->name,
                     ]
                 ]);
    }

    /**
     * Test: Returns 404 if a product is not found.
     */
    public function test_it_returns_404_if_product_not_found(): void
    {
        $response = $this->getJson('/api/products/999'); // An ID that doesn't exist
        $response->assertStatus(404);
    }

    /**
     * Test: Can create a new simple product.
     */
    public function test_it_can_create_a_simple_product(): void
    {
        // Arrange
        $productData = [
            'name' => 'A New Simple Product',
            'slug' => 'a-new-simple-product',
            'type' => ProductType::SIMPLE->value,
            'price' => 99.99,
            'sku' => 'SIMPLE-PROD-001',
            'stock_quantity' => 50,
        ];

        // Act
        $response = $this->postJson('/api/products', $productData);

        // Assert
        $response->assertStatus(201) // Assert "Created" status
                 ->assertJsonFragment(['name' => 'A New Simple Product']);

        $this->assertDatabaseHas('products', [ // Check if the data was actually saved to the DB
            'slug' => 'a-new-simple-product',
            'price' => 99.99,
        ]);
    }
    
    /**
     * Test: Can create a new variable product.
     */
    public function test_it_can_create_a_variable_product(): void
    {
        // Arrange: We need attributes and values first
        $colorAttr = Attribute::factory()->create(['name' => 'Color']);
        $sizeAttr = Attribute::factory()->create(['name' => 'Size']);
        $red = AttributeValue::factory()->create(['attribute_id' => $colorAttr->id, 'value' => 'Red']);
        $large = AttributeValue::factory()->create(['attribute_id' => $sizeAttr->id, 'value' => 'Large']);

        $productData = [
            'name' => 'A New Variable T-Shirt',
            'slug' => 'a-new-variable-t-shirt',
            'type' => ProductType::VARIABLE->value,
            'variations' => [
                [
                    'sku' => 'VAR-TS-001',
                    'price' => 120.00,
                    'stock_quantity' => 15,
                    'attributes' => [$red->id, $large->id]
                ]
            ]
        ];

        // Act
        $response = $this->postJson('/api/products', $productData);
        
        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('products', ['slug' => 'a-new-variable-t-shirt']);
        $this->assertDatabaseHas('product_variations', ['sku' => 'VAR-TS-001']);
        $this->assertDatabaseCount('attribute_value_product_variation', 2); // Check pivot table
    }


    /**
     * Test: Can update a product.
     */
    public function test_it_can_update_a_product(): void
    {
        // Arrange
        $product = Product::factory()->create();
        $updateData = ['name' => 'Updated Product Name'];

        // Act
        $response = $this->putJson('/api/products/' . $product->id, $updateData);

        // Assert
        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Product Name']);
        
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product Name'
        ]);
    }

    /**
     * Test: Can delete a product.
     */
    public function test_it_can_delete_a_product(): void
    {
        // Arrange
        $product = Product::factory()->create();

        // Act
        $response = $this->deleteJson('/api/products/' . $product->id);

        // Assert
        $response->assertStatus(200);
        
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

     /**
     * Test: Can filter produts by type.
     */
    public function test_it_can_filter_products_by_type(): void
    {
        Product::factory()->create(['type' => 'simple']);
        Product::factory()->create(['type' => 'variable']);

        $response = $this->getJson('/api/products?type=simple');
        $response->assertJsonCount(1, 'data.data');
    }

     /**
     * Test: Can filter produts by name.
     */
    public function test_it_can_filter_products_by_name(): void
    {
        Product::factory()->create(['type' => 'simple', 'name' => 'Test product']);

        $response = $this->getJson('/api/products?name=Test');
        $response->assertJsonCount(1, 'data.data');
    }
}