<?php

use Faker\Generator as Faker;
use Helpdesk\ProblemType;
use Helpdesk\Specialism;

$factory->define(Helpdesk\Problem::class, function (Faker $faker) {
    return [
        'type' => ProblemType::all()->random()->id, //get a random problem type id
        'description' => $faker->text(600), //generate some random text for the problem description
        'solution' => $faker->text(600), //generate some random test for the problem soution
        'solved' => $faker->boolean, //random true/false
        'created' => $faker->dateTimeThisYear($max = 'now')->format('Y-m-d H:i:s'), //random date no later than now
        'edited' => $faker->dateTimeThisYear($max = 'now')->format('Y-m-d H:i:s'), //random date no later than now
        'completed' => $faker->dateTimeThisYear($max = 'now')->format('Y-m-d H:i:s'), //random date no later than now
        'specialist' => Specialism::all()->random()->person_id //get random person with a specialism
    ];
});
