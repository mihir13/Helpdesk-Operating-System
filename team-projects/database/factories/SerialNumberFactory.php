<?php

use Faker\Generator as Faker;
use Helpdesk\Hardware;

$factory->define(Helpdesk\SerialNumber::class, function (Faker $faker) {
    return [
        'serial_no' => $faker->asciify('**********'), //random ascii as fake serial number
        'hardware_id' => Hardware::all()->random()->id //get a random hardware type to link to the serial no
    ];
});
