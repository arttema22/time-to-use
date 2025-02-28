<?php

namespace Database\Seeders;

use App\Models\AvailableOption;
use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Option;
use App\Models\Piers;
use App\Models\PriceList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->withPersonalTeam()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(10)->withPersonalTeam()->create();

        // Category::factory()->count(10)
        //     ->has(Vehicle::factory()->count(30))
        //     ->create();

        // Option::factory(20)
        //     ->has(AvailableOption::factory(3))
        //     ->create();

        // Vehicle::factory(20)
        //     ->has(Category::factory(2))
        //     ->has(PriceList::factory(3))
        //     ->has(Piers::factory(4))
        //     ->create();
    }
}
