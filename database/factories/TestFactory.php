<?php

$factory->define(App\Test::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "description" => $faker->name,
        "category_id" => factory('App\Category')->create(),
        "active" => 1,
    ];
});
