<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class ContactFactory extends Factory
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
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'phone' => $faker->phoneNumber(),
            'email' => $faker->email(),
            'address' => $faker->address(),
            'company_id' => Company::pluck('id')->random()

        ];
    }
}
