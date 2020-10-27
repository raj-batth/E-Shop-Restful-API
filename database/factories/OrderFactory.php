<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        return [
            'user_id' => User::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'shipping_address' => json_encode([
                'address' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'postal_code' => $this->faker->postcode,
                'country' => $this->faker->city,
            ]),
            'payment_method' => $this->faker->randomElement(['CASH', 'CREDIT', 'DEBIT']),
            'payment_result' => json_encode([
                'id' => $this->faker->md5,
                'status' => $this->faker->randomElement(['Done', 'Noe-Done']),
                'update_time' => $this->faker->dateTime(),
                'email_address' => $this->faker->safeEmail,
            ]),
            'tax_price' => $this->faker->randomElement([0.5, 0.13]),
            'shipping_price' => $this->faker->randomFloat(10, 20),
            'total_price' => $this->faker->randomFloat(10, 200), // ! TODO need to be calculated dynamically.
            'is_paid' => $this->faker->randomElement([true, false]),
            'paid_at' => $this->faker->dateTime(),
            'is_delivered' => $this->faker->randomElement([true, false]),
            'delivered_at' => $this->faker->dateTime(),
        ];
    }
}
