<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransactionItem>
 */
class TransactionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => Transaction::factory(),
            'product_id' => Product::query()->inRandomOrder()->value('id')
                ?? Product::factory(),
            'quantity' => fake()->numberBetween(1, 5),
            'price' => fn (array $attributes) => Product::query()
                ->whereKey($attributes['product_id'])
                ->value('price') ?? 5000,
        ];
    }
}
