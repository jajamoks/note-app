<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Note;
use App\User;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'name' => $faker->name,
        'description' => $faker->description,
    ];
});
