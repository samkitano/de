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
        \DB::table('profiles')->truncate();

        \DB::table('users')->insert(
            [
                0 => [
                    'first_name' => 'João',
                    'last_name' => 'Caetano',
                    'nick_name' => 'ThePaparranas',
                    'email' => env('J_EMAIL'),
                    'password' => bcrypt(env('J_PW')),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                1 => [
                    'first_name' => 'Sam',
                    'last_name' => 'Kitano',
                    'nick_name' => 'SamKitano',
                    'email' => env('S_EMAIL'),
                    'password' => bcrypt(env('S_PW')),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            ]
        );

        \DB::table('profiles')->insert(
            [
                0 => [
                    'user_id' => 1,
                    'xp' => 1000,
                    'bio' => 'Estudante de Solicitadoria',
                    'use_nick' => true,
                    'changed_nick' => false,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ],
                1 => [
                    'user_id' => 2,
                    'xp' => 1000,
                    'bio' => 'Web developer',
                    'use_nick' => false,
                    'changed_nick' => false,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]
            ]
        );

        factory(App\User::class, 20)->create()->each(function ($u) {
            $u->profile()->save(factory(App\Profile::class)->make(['user_id' => $u->id]));
        });
    }
}
