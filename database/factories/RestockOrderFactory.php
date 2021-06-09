<?php

namespace Database\Factories;

use App\Models\RestockOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RestockOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RestockOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['requested', 'processing', 'shipping', 'completed', 'canceled'];
        return [
            'status' => $status[rand(0, 4)],
            'driver_id' => rand(2, 25),
            'shipping_address' => $this->faker->address,
            'amount' => $this->faker->randomFloat(2, 100, 300),
            'items' => $this->faker->randomFloat(2, 100, 300),
            'shipping' => $this->faker->randomFloat(2, 20, 50),
            'payment_method_id' => rand(1, 10),
        ];
    }
}
