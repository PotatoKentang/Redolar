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
        $storeID = $this->faker->randomNumber();
        $price = $this->faker->randomNumber();
        return [
            'name' => $name,
            'description' => $description,
            'images' => $images,
            'storeID' => $storeID,
            'price'=>$price,
        ];
    }
}
