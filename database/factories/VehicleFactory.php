<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
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
            'name' => $this->faker->company(),
            'qnty_places' => $this->faker->numberBetween(1, 100),
            'date_from' => $this->faker->date,
            'date_to' => $this->faker->date,
            'flag_activity' => $this->faker->boolean(),
            'attribute1' => $this->faker->realText(200),
            'attribute2' => $this->faker->realText(200),
            'attribute3' => $this->faker->realText(200),
            'description' => $this->faker->realText(200),
            'license_plate' => $this->faker->realText(200),
            'qnty_siutes' => $this->faker->numberBetween(0, 5),
            'qnty_toilets' => $this->faker->numberBetween(0, 5),
            'colour' => $this->faker->colorName,
            'length' => $this->faker->numberBetween(1, 60),
            'width' => $this->faker->numberBetween(1, 10),
            'speed' => $this->faker->numberBetween(0, 100),
            'flag_captain' => $this->faker->boolean(),
            'flag_shower' => $this->faker->boolean(),
            'flag_fridge' => $this->faker->boolean(),
            'flag_kitchen' => $this->faker->boolean(),
            'flag_audio' => $this->faker->boolean(),
            'flag_tv' => $this->faker->boolean(),
            'flag_open_deck' => $this->faker->boolean(),
            'flag_flybridge' => $this->faker->boolean(),
        ];
    }
}
