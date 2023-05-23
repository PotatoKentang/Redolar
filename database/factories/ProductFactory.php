<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $description = $this->faker->sentence();
        $images = $this->faker->imageUrl();
        $shopID = mt_rand(1,3);
        $price = $this->faker->randomNumber();
        return [
            'name' => $name,
            'description' => $description,
            'images' => $images,
            'shop_id' => $shopID,
            'price'=>$price,
            'quantity'=>mt_rand(1,100),
        ];
    }
}
