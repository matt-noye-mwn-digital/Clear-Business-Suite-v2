<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = [
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active'
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active',
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active',
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active',
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active',
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active',
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active',
            ],
            [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($faker->password),
                'status' => 'active',
            ],
        ];
        foreach($users as $userData) {
            $user = User::create($userData);

            $user->assignRole('client');

            $userDetail = [
                'user_id' => $user->id,
                'company_name' => $faker->company,
                'default_language' => 'English',
                'address_line_one' => $faker->streetAddress,
                'address_line_two' => $faker->streetAddress,
                'town_city' => $faker->city,
                'zip_postcode' => $faker->postcode,
                'country' => $faker->country,
                'landline_number' => $faker->phoneNumber,
                'mobile_number' => $faker->phoneNumber,
                'default_payment_method' => 'Bank Transfer',
                'website' => $faker->url,
            ];

            UserDetail::create($userDetail);
        }
    }
}
