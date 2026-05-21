<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();

        Transaction::factory()
            ->count(50)
            ->create()
            ->each(function (Transaction $transaction) {
                $createdAt = fake()->dateTimeBetween('-30 days', 'now');

                $transaction->forceFill([
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ])->save();
            });
    }
}
