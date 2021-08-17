<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence(),
            'name'=> $this->faker->name(),
            'phone'=> $this->faker->phoneNumber(),
            'placa' => $this->faker->userName(),
            'vehicle' => $this->faker->randomElement(['camioneta', 'automovil']),

        ];
    }
}
