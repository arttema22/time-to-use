<?php

namespace Database\Factories;

use App\Models\MoonshineUser;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::all()->random(),
            'moonshine_user_id' => MoonshineUser::all()->random(),
            'frequest_status' => $this->faker->boolean(),
            'request_date_from' => $this->faker->date,
            'request_date_to' => $this->faker->date,
        ];
    }
}
