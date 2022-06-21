<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = $this->faker->randomElement($array = array(39.99, 49.99, 59.99, 69.99));
        $slider = $this->faker->randomElement($array = array(0, 1));

        return [
            //bluemmb/faker-picsum-photos-provider
            'name' => $this->faker->text(20),
            'image' => 'images/no-photo.png',
            'description' => $this->faker->paragraph(1),
            'user_id' => $this->faker->numberBetween($min =  1, $max = 3),
            'category_id' => $this->faker->numberBetween($min =  1, $max = 4),
            'slider' => $slider,
            'price' => $price,
        ];
    }
}
