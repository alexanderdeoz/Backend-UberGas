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
        'description' => $this->faker->paragraph(),
        'name' => $this->faker->word(),
        'price' => $this->faker->numberfloat(),
        'img_url' => $this->faker->imageUrl(),
        ];
    }
}
