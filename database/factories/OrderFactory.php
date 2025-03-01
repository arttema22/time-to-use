<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random(),
            'flag_activity' => $this->faker->boolean(),
            'date_time_order' => $this->faker->dateTime(),
            'qnty_places' => $this->faker->numberBetween(0, 5),
            'date_from' => $this->faker->date,
            'date_to' => $this->faker->date,
            'latitude' => $this->faker->numberBetween(0, 5),
            'longitude' => $this->faker->numberBetween(0, 5),
            //'url_yandex_map'
            'comment' => $this->faker->realText(100),
            'colour' => $this->faker->colorName,
            'length' => $this->faker->numberBetween(0, 5),
            'width' => $this->faker->numberBetween(0, 5),
            'speed' => $this->faker->numberBetween(0, 5),
            'qnty_siutes' => $this->faker->numberBetween(0, 5),
            'qnty_toilets' => $this->faker->numberBetween(0, 5),
            'flag_captain' => $this->faker->boolean(),
            'flag_shower' => $this->faker->boolean(),
            'flag_fridge' => $this->faker->boolean(),
            'flag_kitchen' => $this->faker->boolean(),
            'flag_audio' => $this->faker->boolean(),
            'flag_tv' => $this->faker->boolean(),
            'flag_open_deck' => $this->faker->boolean(),
            'flag_flybridge' => $this->faker->boolean(),
            'status_order' => $this->faker->word(),
            'qnty_ordered' => $this->faker->numberBetween(0, 5),
        ];
    }
}
