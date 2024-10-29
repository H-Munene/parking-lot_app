<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $parkinglots = [
            [
                'pl_name' => 'PL_1',

            ],
            [
                'pl_name' => 'PL_2',

            ],
            [
                'pl_name' => 'PL_3',

            ],
            [
                'pl_name' => 'PL_4',

            ],
            [
                'pl_name' => 'PL_5',

            ],
        ];
    
        DB::table('parking_lots')->insert($parkinglots);

        $this->call([
            PaymentOptionSeeder::class,
        ]);
    }
}
