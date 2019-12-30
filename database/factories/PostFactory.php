<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
    	'category_id' => random_int(1,3),
        'user_id' => random_int(1,4),
        'title' => $faker->sentence(3),
        'content' => $faker->sentence(30),
        'thumbnail' => 'abc.jpg',
    ];
});
