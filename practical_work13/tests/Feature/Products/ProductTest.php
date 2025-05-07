<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product; // Импортируем модель Product

class ProductTest extends TestCase
{
    use RefreshDatabase; // Используем трейт для обновления базы данных перед каждым тестом

    /**
     * Test that products can be indexed.
     */
    public function test_products_can_be_indexed(): void
    {
        Product::factory()->count(5)->create(); // Создаем несколько продуктов для теста

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
                 ->assertJsonCount(5); // Проверяем, что вернулось 5 продуктов
    }

    /**
     * Test that a product can be shown.
     */
    public function test_product_can_be_shown(): void
    {
        $product = Product::factory()->create(); // Создаем один продукт

        $response = $this->getJson('/api/products/' . $product->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'sku' => $product->sku,
                     'name' => $product->name,
                     'price' => $product->price,
                 ]); // Проверяем, что данные продукта совпадают
    }

    /**
     * Test that a product can be stored.
     */
    public function test_product_can_be_stored(): void
    {
        $productData = [
            'sku' => 'TEST-SKU-456',
            'name' => 'Test Product for Store',
            'price' => 789.123,
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201) // Проверяем статус 201 Created
                 ->assertJsonFragment($productData); // Проверяем, что данные продукта присутствуют в ответе

        $this->assertDatabaseHas('products', $productData); // Проверяем, что продукт был создан в базе данных
    }

    /**
     * Test that a product can be updated.
     */
    public function test_product_can_be_updated(): void
    {
        $product = Product::factory()->create(); // Создаем продукт для обновления

        $updatedData = [
            'price' => 111.222,
        ];

        $response = $this->putJson('/api/products/' . $product->id, $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData); // Проверяем, что обновленные данные присутствуют в ответе

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'price' => 111.222,
        ]); // Проверяем, что продукт был обновлен в базе данных
    }

    /**
     * Test that a product can be destroyed.
     */
    public function test_product_can_be_destroyed(): void
    {
        $product = Product::factory()->create(); // Создаем продукт для удаления

        $response = $this->deleteJson('/api/products/' . $product->id);

        $response->assertStatus(204); // Проверяем статус 204 No Content

        $this->assertDatabaseMissing('products', ['id' => $product->id]); // Проверяем, что продукт был удален из базы данных
    }
}