<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'menu_name' => $this->faker->sentence(),
            'cost_price' => $this->faker->numberBetween($min = 10, $max = 30),
            'description' => $this->faker->text(),
            'selling_price' => $this->faker->numberBetween($min = 20, $max = 40),
            'menu_images' => $this->faker->imageUrl(640, 480),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'created_at' => \Carbon\Carbon::now()
        ];
    }
}
