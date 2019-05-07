<?php

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        "question" => $faker->name,
        "score" => $faker->randomNumber(2),
        "answer1" => $faker->name,
        "correct1" => 0,
        "answer2" => $faker->name,
        "correct2" => 0,
        "answer3" => $faker->name,
        "correct3" => 0,
        "answer4" => $faker->name,
        "correct4" => 0,
        "answer5" => $faker->name,
        "correct5" => 0,
    ];
});
