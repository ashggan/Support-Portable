<?php

use Faker\Generator as Faker;

$factory->define(App\Request::class, function (Faker $faker) {
    return [
        //
        'detials' => $faker->paragraph(rand(6,10),true),
        'ticket' => $faker->random(4),

    ];
});
