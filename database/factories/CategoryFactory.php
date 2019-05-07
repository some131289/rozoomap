<?php

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "discipline_id" => factory('App\Discipline')->create(),
        "class" => $faker->randomNumber(2),
        "description" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "active" => 1,
    ];
});
