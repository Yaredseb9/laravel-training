<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => User::factory(),
            
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
