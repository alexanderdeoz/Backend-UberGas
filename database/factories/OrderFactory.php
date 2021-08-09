<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\UserU;
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
            $usersU = UserU::get();
            $drivers = Driver::get();
    
            return [
                'user_u_id' => $this->faker->randomElement($usersU),
                'driver_id' => $this->faker->randomElement($drivers),
                'calification' => $this->faker->numerify('calificacion ###'),
                'delivery_cost' => $this->faker->randomFloat(),
                'delivery_date' => $this->faker->dateTimeThisCentury($max = 'now', $timezone = null),
                'state' => $this->faker->randomElement(['pendiente', 'aceptado', 'viaje', 'entregado']),
                'method_payment' => $this->faker->randomElement(['efectivo', 'tarjeta', 'cupon']),
                'wait_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
                'total_price' => $this->faker->randomFloat(),
            ];
        
    }
}
