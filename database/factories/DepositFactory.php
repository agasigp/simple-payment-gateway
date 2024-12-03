<?php

namespace Database\Factories;

use App\Models\Deposit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deposit>
 */
class DepositFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fake()->unique()->numerify('TRX###'),
            'amount' => fake()->randomFloat(2, -1000000, 1000000),
            'timestamp' => fake()->unixTime()
        ];
    }

     /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Deposit $deposit) {
            $user = $deposit->user;
            $user->balance = $user->balance + $deposit->amount;
            $user->save();
        });
    }
}
