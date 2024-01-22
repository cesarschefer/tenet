<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consumption>
 */
class ConsumptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'quantity' => function (array $attributes) {
                $serviceId = $attributes['service_id'];
                return $serviceId == 1 ? $this->faker->numberBetween(1, 12) : $this->faker->numberBetween(1, 10000);
            },
            'created_at' => $this->faker->dateTimeBetween('-15 days', 'now'),
        ];


    }
}
