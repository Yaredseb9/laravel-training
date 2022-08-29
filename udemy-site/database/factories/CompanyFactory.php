<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        
        return [
            'name' => $faker->company(),
            'address' => $faker->address(),
            'website' => $faker->domainName(),
            'email' => $faker->email(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
