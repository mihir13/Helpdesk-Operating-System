<?php

use Faker\Generator as Faker;
use Helpdesk\Department;

$factory->define(Helpdesk\Person::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->bothify('???###'), //generate random id style string
        'first_name' => $faker->firstName, //random first name
        'last_name' => $faker->lastName, //random last name
        'job_title' => $faker->jobTitle, //random job title
        'dept_id' => Department::all()->random()->id, //get a random department id to assign the person to
        'tel_no' => $faker->phoneNumber //random phone number
    ];
});
