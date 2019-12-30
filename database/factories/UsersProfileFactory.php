<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UsersProfile;
use Faker\Generator as Faker;

$factory->define(UsersProfile::class, function (Faker $faker) {
    return [
    	'user_id' => random_int(1,3),
        'city' => $faker->sentence(5),
    ];
});
