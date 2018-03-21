<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('administrators')->truncate();

        \DB::table('administrators')->insert(
            [
                0 => [
                    'name' => 'João Caetano',
                    'nick_name' => 'ThePaparranas',
                    'email' => env('J_EMAIL'),
                    'password' => bcrypt(env('J_PW')),
                    'root_user' => true,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
            ],
                1 => [
                    'name' => 'Sam Kitano',
                    'nick_name' => 'SamKitano',
                    'email' => env('S_EMAIL'),
                    'password' => bcrypt(env('S_PW')),
                    'root_user' => true,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            ]
        );
    }
}
