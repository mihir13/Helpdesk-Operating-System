<?php

use Faker\Generator as Faker;

$factory->define(Helpdesk\Department::class, function (Faker $faker) {
    return [
        'name' => $faker->company //closest faker type to department name is comapny so use that
    ];
});
