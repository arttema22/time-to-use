<?php

namespace Database\Factories;

use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceList>
 */
class PriceListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => Owner::all()->random(),
            'vehicle_id' => Vehicle::all()->random(),
            'price' => $this->faker->randomFloat(16),
            'date_from' => $this->faker->date,
            'date_to' => $this->faker->date,
            'flag_activity' => $this->faker->boolean(),
        ];
    }
}
