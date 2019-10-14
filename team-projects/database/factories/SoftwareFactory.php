<?php

use Faker\Generator as Faker;

$factory->define(Helpdesk\Software::class, function (Faker $faker) {
    return [
        'name' => ($faker->company).' '.($faker->word) //software name as random company name concat with a random word e.g. microsoft bob ;)
    ];
});
