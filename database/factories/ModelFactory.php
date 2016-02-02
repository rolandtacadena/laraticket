<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/**
 * My Model Factory for generating Dummy User records
 */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

/**
 * My Model Factory for generating Dummy Backlog records
 */
$factory->define(App\Backlog::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(15),
        'description' => $faker->sentence,
    ];
});

/**
 * My Model Factory for generating Dummy Ticket records
 */
$factory->define(App\Ticket::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 2),
        'backlog_id' => $faker->numberBetween(1, 5),
        'title' => $faker->text(),
        'description' => $faker->sentence(),
        'type' => $faker->randomElement(['bug', 'task']),
        'priority' => $faker->randomElement(['high', 'medium', 'low']),
        'status' => $faker->randomElement(['open', 'close']),
        'dev_loe' => $faker->randomDigitNotNull,
        'description' => $faker->sentence,
    ];
});

/**
 * My Model Factory for generating Dummy Comment records
 */
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'comment' => $faker->sentence(),
        'user_id' => 1,
        'ticket_id' => 1,
    ];
});


