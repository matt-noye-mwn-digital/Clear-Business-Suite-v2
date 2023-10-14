<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create([
            'name' => 'Bank Transfer',
        ]);
        PaymentMethod::create([
            'name' => 'Credit / Debit Card'
        ]);
        PaymentMethod::create([
            'name' => 'Direct Debit'
        ]);
        PaymentMethod::create([
            'name' => 'PayPal'
        ]);
        PaymentMethod::create([
            'name' => 'Cash'
        ]);
    }
}
