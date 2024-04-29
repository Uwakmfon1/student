<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Factory as Faker;



// $factory->define(App\)
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();


        return [
            'name'=>$faker->name,
            'course'=>$faker->word,
            'email'=>$faker->unique()->safeEmail,
            'phone'=>$faker->numberBetween(10000000000, 99999999999)
        ];
    }
}
