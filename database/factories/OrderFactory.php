<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $clients = Client::get();
            $drivers = Driver::get();
    
            return [
                'user_id' => $this->faker->randomElement($clients),
                'driver_id' => $this->faker->randomElement($drivers),
                'deliveryPrice' => $this->faker->randomFloat(),
                'deliveryDate' => $this->faker->dateTime(),
                'state' => $this->faker->randomElement(['pendiente', 'aceptado', 'en camino', 'entregado']),
                'payment' => $this->faker->randomElement(['efectivo', 'tarjeta']),
                'wait_time' => $this->faker->time('H:i:s'),
                ];
        
    }
}
