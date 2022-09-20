<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // $this->call([
        //     CompaniesTableSeeder::class,
        //     ContactsTableSeeder::class,
        // ]);
        // $this->call(ContactsTableSeeder::class);

        // $users = factory(User::class, 5)->create();
        // $users = User::factory()->count(5)->create();

        // $users->each(function ($user){
        //     $companies = $user->compaies()->saveMany(
        //         Company::factory()->count(rand(2,5))->make()
        //     );

        //     $companies->each(function ($company) use ($user){
        //         $company->contacts()->saveMany(
        //             Contact::factory()->count(rand(5,10))
        //             ->make()
        //             ->map(function($contact) use ($user){
        //                 $contact->user_id = $user->id;
        //                 return $contact;
        //             })
        //         );
        //     });
        // });



        // $users = factory(User::class, 5)->create();

        // $users->each(function ($user) {
        //     $companies = $user->companies()->saveMany(
        //         factory(Company::class, rand(2, 5))->make()
        //     );
            
        //     $companies->each(function ($company) use ($user) {
        //         $company->contacts()->saveMany(
        //             factory(Contact::class, rand(5, 10))
        //                 ->make()
        //                 ->map(function ($contact) use ($user) {
        //                     $contact->user_id = $user->id;
        //                     return $contact;
        //                 })
        //         );
        //     });
        // });


        User::factory()
            ->count(5)
            ->has(Company::factory()->count(3))
            ->has(Contact::factory()->count(10))
            ->create();
    }
}
