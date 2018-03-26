<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        \DB::table('users')->insert(
            [
                0 => [
                    'first_name' => 'João',
                    'last_name' => 'Caetano',
                    'nick_name' => 'ThePaparranas',
                    'email' => env('J_EMAIL'),
                    'xp' => 1000,
                    'bio' => 'Estudante de procuradoria',
                    'changed_nick' => false,
                    'password' => bcrypt(env('J_PW')),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                1 => [
                    'first_name' => 'Sam',
                    'last_name' => 'Kitano',
                    'nick_name' => 'SamKitano',
                    'email' => env('S_EMAIL'),
                    'xp' => 1000,
                    'bio' => 'Web developer. Artisan. Vuer',
                    'changed_nick' => false,
                    'password' => bcrypt(env('S_PW')),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            ]
        );

        factory(App\User::class, 20)->create();
    }
}
