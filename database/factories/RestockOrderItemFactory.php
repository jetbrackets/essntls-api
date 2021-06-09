<?php

namespace Database\Factories;

use App\Models\RestockOrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RestockOrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RestockOrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => rand(1, 5),
            'qty' => rand(1, 5),
            'value' => $this->faker->randomFloat(2, 60, 100),
            'restock_order_id' => rand(1, 40),
        ];
    }
}
