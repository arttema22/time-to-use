<?php

namespace Database\Seeders;

use App\Models\AvailableOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvailableOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AvailableOption::factory()->count(90)->create();
    }
}
