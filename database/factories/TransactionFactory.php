<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->value('id')
                ?? User::factory(),
            'payment_method' => fake()->randomElement(['cash', 'transfer', 'qris']),
            'total_amount' => 0,
        ];
    }

    /**
     * Configure the model factory.
     *
     * Setelah transaksi dibuat, otomatis generate 1-5 item random dan
     * recalculate total_amount berdasarkan item-item tersebut.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Transaction $transaction) {
            $productIds = Product::query()
                ->inRandomOrder()
                ->limit(fake()->numberBetween(1, 5))
                ->pluck('id');

            $total = 0;

            foreach ($productIds as $productId) {
                $item = TransactionItem::factory()->create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $productId,
                ]);

                $total += $item->quantity * $item->price;
            }

            $transaction->update(['total_amount' => $total]);
        });
    }
}
