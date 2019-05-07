<?php

$factory->define(App\Discipline::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "active" => 1,
    ];
});
