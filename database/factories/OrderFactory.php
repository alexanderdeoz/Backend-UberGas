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
            $usersU = Client::get();
            $drivers = Driver::get();
    
            return [
                'user_id' => $this->faker->randomElement($usersU),
                'driver_id' => $this->faker->randomElement($drivers),
                'calification' => $this->faker->numerify('calificacion ###'),
                'deliveryCost' => $this->faker->randomFloat(),
                'deliveryDate' => $this->faker->dateTimeThisCentury($max = 'now', $timezone = null),
                'state' => $this->faker->randomElement(['pendiente', 'aceptado', 'viaje', 'entregado']),
                'payment' => $this->faker->randomElement(['efectivo', 'tarjeta', 'cupon']),
                'wait_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
                'totalPrice' => $this->faker->randomFloat(),
            ];
        
    }
}
