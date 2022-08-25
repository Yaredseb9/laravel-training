<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contacts')->truncate();

        $contacts = [];

        $faker = Faker::create();

        foreach(range(1,10) as $index){
            $contacts[] = [
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'address' => $faker->address(),
                'company_id' => $faker->company(),
                'created_at' => now(),
                'updated_at' => now(),
                // 'name' => $name = "Company $index",
                // 'address' => "Address $name",
                // 'website' => "Website $name",
                // 'email' => "Email $name",
                // 'created_at' => now(),
                // 'updated_at' => now(),

            ];
        }
        
        DB::table('contacts')->insert($contacts);
    }
}
