<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'description' => $this->faker->randomElement(['tanque de gas de uso domestico','tanque de gas de uso insdustrial']),
        'name' => $this->faker->word(),
        'price' => $this->faker->numberfloat(),
        ];
    }
}
