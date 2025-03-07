<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AvailableOption>
 */
class AvailableOptionFactory extends Factory
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
            'option_id' => Option::all()->random(),
            'qnty_available' => $this->faker->numberBetween(1, 10),
            'date_from' => $this->faker->date,
            'date_to' => $this->faker->date,
            'attribute1' => $this->faker->realText(200),
            'attribute2' => $this->faker->realText(200),
            'attribute3' => $this->faker->realText(200),
            'flag_activity' => $this->faker->boolean(),
        ];
    }
}
