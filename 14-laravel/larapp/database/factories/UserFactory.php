<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /*opción 1 género
        $genderNum = $this->faker->numberBetween($min = 0, $max = 1);
        if($genderNum==0){ //mujer
            $gender = 'Female';
            $name = $this->faker->name($gender = 'female');
        }else{
            $gender = 'Male';
            $name = $this->faker->name($gender = 'male');
        } */

        //opción 2 género
        //$photo = $this->faker->image('public/images', 800, 600, null, false);
        //$photo = $this->faker->imageUrl(800, 600);

        // https://picsum.photos/800/600?random=12965
        //$fakerFileName = $this->faker->image(storage_path("app/data"), 800, 600);
        //$ran = random_int(100, 999);
        $gender = $this->faker->randomElement($array = array('Male', 'Female'));


        $photo = $this->faker->image('public\images', 800, 600);

        return [
            //bluemmb/faker-picsum-photos-provider
            'fullname' => $this->faker->name($gender),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numberBetween($min =  3101000000, $max = 3202000000),
            'birthdate' => $this->faker->dateTimeBetween('1960-01-01', '1999-12-31'),
            'gender' => $gender,
            'address' => $this->faker->address(),
            'email_verified_at' => now(),
            'password' => $this->faker->password(), // password
            'remember_token' => Str::random(10),
            //'photo' => 'https://picsum.photos/200/300.jpg'
            /* 'url' => $this->faker->imageUrl(800,600),
            'file_path' => "public/images" . basename($fakerFileName), */
            'photo' => $photo,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
