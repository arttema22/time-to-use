<?php

namespace Database\Factories;

use App\Models\Piers;
use App\Models\PriceList;
use App\Models\Request;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'request_id' => Request::all()->random(),
            'status_response' => $this->faker->word(),
            'date_time_response' => $this->faker->dateTime(),
            'qnty_approved' => $this->faker->numberBetween(0, 5),
            'vehicle_id' => Vehicle::all()->random(),
            'price_list_id' => PriceList::all()->random(),
            'pier_id' => Piers::all()->random(),
            'response_date_from' => $this->faker->date,
            'response_date_to' => $this->faker->date,
        ];
    }
}
