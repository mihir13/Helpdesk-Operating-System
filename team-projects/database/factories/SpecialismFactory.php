<?php

use Faker\Generator as Faker;
use Helpdesk\Person;
use Helpdesk\ProblemType;

$factory->define(Helpdesk\Specialism::class, function (Faker $faker) {
    return [
        'person_id' => Person::all()->random()->id, //get a random person
        'specialism' => ProblemType::all()->random()->id //get a random type of problem
    ];
});
