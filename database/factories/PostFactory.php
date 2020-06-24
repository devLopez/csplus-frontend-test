<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Spa\Models\Post;

$factory->define(Post::class, function (Faker $faker)
{
    $showTime = (bool) rand(0, 1);

    return [
        'title'      => $faker->sentence(5),
        'text'       => $faker->text(250),
        'publish_at' => $showTime ? $faker->dateTime : null,
    ];
});
