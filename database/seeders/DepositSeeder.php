<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->find(1);

        Deposit::factory()
            ->count(5)
             ->sequence(
                 ['amount' => 1000000],
                 ['amount' => -500000],
                 ['amount' => -400000],
                 ['amount' => 250000],
                 ['amount' => -50000],
             )
            ->for($user)
            ->create();
    }
}
