<?php

use Faker\Generator as Faker;
use Helpdesk\Person;

$factory->define(Helpdesk\User::class, function (Faker $faker) {
    return [
        'username' => Person::all()->random()->id, // get a person ID
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // 'secret' hashed
        'remember_token' => str_random(10), // random placeholder remember token
    ];
});
