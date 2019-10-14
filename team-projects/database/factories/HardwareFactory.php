<?php

use Faker\Generator as Faker;

$factory->define(Helpdesk\Hardware::class, function (Faker $faker) {
    return [
        'type' => $faker->word, //use a random word for type of hardware
        'make' => $faker->company, //use a random company name for make of hardware
        'model' => $faker->word //use a random word for the model of the hardware
    ];
});
