<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => 0,
            'name' => $this->faker->company(),
            'description' => $this->faker->realText(200),
            'code_type_category' => 512,
            'date_from' => $this->faker->date,
            'date_to' => $this->faker->date,
            'comment' => $this->faker->realText(200),
            'attribute1' => $this->faker->realText(200),
            'attribute2' => $this->faker->realText(200),
            'attribute3' => $this->faker->realText(200),
            'flag_activity' => $this->faker->boolean(),
        ];
    }
}
