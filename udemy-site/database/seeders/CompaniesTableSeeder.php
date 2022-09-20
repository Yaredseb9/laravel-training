<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Company::factory()->count(50)->create();

        // DB::table('companies')->detete();

        // $companies = [];

        // $faker = Faker::create();

        // foreach(range(1,10) as $index){
        //     $companies[] = [
        //         'name' => $faker->company(),
        //         'address' => $faker->address(),
        //         'website' => $faker->domainName(),
        //         'email' => $faker->email(),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         // 'name' => $name = "Company $index",
        //         // 'address' => "Address $name",
        //         // 'website' => "Website $name",
        //         // 'email' => "Email $name",
        //         // 'created_at' => now(),
        //         // 'updated_at' => now(),

        //     ];
        // }

        // DB::table('companies')->insert($companies);

    }
}
