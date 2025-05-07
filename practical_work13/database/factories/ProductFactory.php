<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku' => $this->faker->unique()->ean13, // Генерирует уникальный SKU
            'name' => $this->faker->word . ' ' . $this->faker->colorName, // Генерирует название
            'price' => $this->faker->randomFloat(3, 1, 1000), // Генерирует цену с 3 знаками после запятой
        ];
    }
}