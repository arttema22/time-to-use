<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Owner;
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
            'owner_id' => Owner::all()->random(),
            'frequest_status' => $this->faker->boolean(),
            'request_date_from' => $this->faker->date,
            'request_date_to' => $this->faker->date,
        ];
    }
}
