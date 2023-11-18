<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestingClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
            'status' => 'active',
        ])->assignRole('client');
    }
}
