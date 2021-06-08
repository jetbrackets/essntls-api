<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $status = ['pending', 'accepted', 'canceled', 'done'];
        return [
            'status' => $status[rand(0, 3)],
            'driver_id' => rand(2, 25),
            'customer_id' => rand(2, 25),
            'departure_address' => $this->faker->address,
            'delivery_address' => $this->faker->address,
            'amount' => $this->faker->randomFloat(2, 100, 300),
            'items' => $this->faker->randomFloat(2, 100, 300),
            'shipping' => $this->faker->randomFloat(2, 20, 50),
            'commission' => $this->faker->randomFloat(2, 20, 50),
            'profit' => $this->faker->randomFloat(2, 20, 50),
            'accepted_in' => $this->faker->time(),
            'arrival_in' => $this->faker->time(),
            'delivery_time' => $this->faker->time(),
        ];
    }
}
