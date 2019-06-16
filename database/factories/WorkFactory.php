<?php

$factory->define(App\Work::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "description" => $faker->name,
    ];
});
