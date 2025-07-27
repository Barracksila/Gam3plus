<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: Clear the table before seeding
        DB::table('_player')->truncate();

        DB::table('_player')->insert([
            [
                'Player_id'    => 1,
                'Player_Name'  => 'SpeedRacer',
                'Country'      => 'KE',
                'email'        => 'speedracer@example.com',
                'Avatar'       => 'https://i.pravatar.cc/40?img=1',
                'Phone_Number' => 123456789,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Player_id'    => 2,
                'Player_Name'  => 'TurboFlash',
                'Country'      => 'US',
                'email'        => 'turboflash@example.com',
                'Avatar'       => 'https://i.pravatar.cc/40?img=2',
                'Phone_Number' => 987654321,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'Player_id'    => 3,
                'Player_Name'  => 'NitroNova',
                'Country'      => 'GB',
                'email'        => 'nitronova@example.com',
                'Avatar'       => 'https://i.pravatar.cc/40?img=3',
                'Phone_Number' => 555123456,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
