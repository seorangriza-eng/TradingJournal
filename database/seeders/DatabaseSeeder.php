<?php

namespace Database\Seeders;

use App\Models\Pair;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Pair::insert([
            ['name' => 'EUR/USD', 'type' => 'major', 'is_active' => 1],
            ['name' => 'GBP/USD', 'type' => 'major', 'is_active' => 1],
            ['name' => 'XAU/USD', 'type' => 'major', 'is_active' => 1],
            ['name' => 'AUD/USD', 'type' => 'minor', 'is_active' => 1],
            ['name' => 'NZD/USD', 'type' => 'minor', 'is_active' => 1],
            ['name' => 'USD/CHF', 'type' => 'minor', 'is_active' => 1],
            ['name' => 'USD/CAD', 'type' => 'minor', 'is_active' => 1],
        ]);
    }
}
