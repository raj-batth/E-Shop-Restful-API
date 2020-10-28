<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
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
            'user_id' => $this->faker->randomElement(User::where('is_admin', '=', 1)->get('id')),
            'name' => $this->faker->word,
            'brand' => $this->faker->randomElement(['Amazon', 'Apple', 'Samsung']),
            'category' => $this->faker->randomElement(['laptop', 'mobile', 'others']),
            'description' => $this->faker->sentence(2),
            'img' => $this->faker->randomElement([
                '/img/airpods.jpg',
                '/img/alexa.jpg',
                '/img/camera.jpg',
                '/img/mouse.jpg',
                '/img/phone.jpg',
                '/img/playstation.jpg']),
            'rating' => 0,
            'num_review' => 0,
            'price' => $this->faker->randomFloat(null, 1, 100),
            'quantity' => $this->faker->randomDigit,

        ];
    }
}
