<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'xp' => $faker->numberBetween(1, 500),
        'bio' => $faker->sentence,
        'use_nick' => $faker->boolean,
        'changed_nick' => $faker->boolean,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
