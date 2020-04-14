<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'name' => $faker->sentence(),
        'body' => $faker->paragraph(10),
        'slug' => $faker->word()
    ];
});
