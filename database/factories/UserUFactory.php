<?php

namespace Database\Factories;

use App\Models\UserU;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserUFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserU::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address(),
            'payment_method' => $this->faker->randomElement(['efectivo', 'tarjeta', 'cupon']),
        ];
    }
}
