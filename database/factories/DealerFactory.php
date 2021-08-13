<?php

namespace Database\Factories;

use App\Models\Dealer;
use Illuminate\Database\Eloquent\Factories\Factory;

class DealerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dealer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address'=> $this->faker->address(),
            'calification'=> $this->faker->numberBetween(1,5),
            'city'=> $this->faker->word(),
            'country'=> $this->faker->word(),
            'img_url'=> $this->faker->imageUrl(),
            'name'=> $this->faker->word(),
            'phone'=> $this->faker->phoneNumber(),
            'time_close'=> $this->faker->time(),
            'time_open'=> $this->faker->time(),
        ];
    }
}
