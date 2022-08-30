<?php

use App\User;
use App\Company;
use App\Contact;
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
        $users = factory(User::class, 5)->create();

        $users->each(function ($user) {
            $companies = $user->companies()->saveMany(
                factory(Company::class, rand(2, 5))->make()
            );
            
            $companies->each(function ($company) use ($user) {
                $company->contacts()->saveMany(
                    factory(Contact::class, rand(5, 10))
                        ->make()
                        ->map(function ($contact) use ($user) {
                            $contact->user_id = $user->id;
                            return $contact;
                        })
                );
            });
        });
    }
}
