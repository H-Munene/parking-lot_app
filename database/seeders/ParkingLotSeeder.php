<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParkingLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parkinglots = [
            [
                'pl_initials' => 'PL_1',

            ],
            [
                'pl_initials' => 'PL_2',

            ],
            [
                'pl_initials' => 'PL_3',

            ],
            [
                'pl_initials' => 'PL_4',

            ],
            [
                'pl_initials' => 'PL_5',

            ],
        ];
    
    DB::table('parking_lots')->insert($parkinglots);
    
    }
}
