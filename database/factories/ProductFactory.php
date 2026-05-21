<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Pool nama produk UMKM generik untuk data dummy random.
     *
     * @var list<string>
     */
    private const PRODUCT_NAMES = [
        'Beras Premium 5kg',
        'Minyak Goreng 2L',
        'Gula Pasir 1kg',
        'Teh Botol 350ml',
        'Aqua 600ml',
        'Kopi Sachet',
        'Indomie Goreng',
        'Chitato Sapi Panggang',
        'Sabun Mandi',
        'Pasta Gigi',
        'Nugget 500g',
        'Sosis 500g',
        'Buku Tulis 38 Lembar',
        'Pulpen Hitam',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(self::PRODUCT_NAMES),
            'price' => fake()->numberBetween(5, 500) * 1000,
            'stock' => fake()->numberBetween(0, 100),
            'image' => null,
            'category_id' => Category::query()->inRandomOrder()->value('id')
                ?? Category::factory(),
        ];
    }

    /**
     * Indicate that the product is out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }
}
