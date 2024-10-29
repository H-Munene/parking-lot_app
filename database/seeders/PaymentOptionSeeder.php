<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_options = [[
            'payment_option' => 'M-pesa'
        ],[
            'payment_option' => 'Card'
        ],[
            'payment_option' => 'Cash'
        ]];

        DB::table('payment_options')->insert($payment_options);
    }
}
