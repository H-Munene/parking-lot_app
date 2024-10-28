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
      

        $users = [
            [
                'username' =>'Hezekiah Munene',
                'email' => 'hezemunene01@gmail.com',
                'password' => Hash::make('12345'),
                'vehicle_lp' => 'KGM 602G',
                'phone_number'=> '0712345678',
            ],
            [
                'username' =>'Loreim Ipsum',
                'email' => 'loreiem01@gmail.com',
                'password' => Hash::make('12345'),
                'vehicle_lp' => 'KHM 604F',
                'phone_number'=> '0712315678',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
