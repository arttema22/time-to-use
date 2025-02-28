<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Piers>
 */
class PiersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->realText(200),
            'attribute1' => $this->faker->realText(200),
            'attribute2' => $this->faker->realText(200),
            'attribute3' => $this->faker->realText(200),
            'flag_activity' => $this->faker->boolean(),
            'latitude' => $this->faker->randomFloat(9, 1, 999),
            'longitude' => $this->faker->randomFloat(9, 1, 999),
            'url_yandex_map' => $this->faker->realText(100),
        ];
    }
}
