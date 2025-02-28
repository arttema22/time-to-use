<?php

namespace Database\Seeders;

use App\Models\Piers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Piers::factory()->count(30)->create();
    }
}
