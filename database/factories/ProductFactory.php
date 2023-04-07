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
    public function definition(): array
    {
        return [
            'user_id'=>1,
            'category_id'=>rand(1,3),
            'brand_id'=>rand(1,6),
            'title'=>fake()->sentence(),
            'price'=>rand(1000,5000),
            'content'=>fake()->paragraph(10),
            'photo'=>'image.jpg',
        ];
    }
}
