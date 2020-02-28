<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
 |--------------------------------------------------------------------------
 | Model Factories
 |--------------------------------------------------------------------------
 |
 | This directory should contain each of the model factory definitions for
 | your application. Factories provide a convenient way to generate new
 | model instances for testing / seeding your application's database.
 |
 */

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'login' => $faker->unique()->firstName,
        'email' => $faker->unique()->email,
        'password' => bcrypt('factory123'),
        'role' => 'RW',
        'active' => '1',
        'remember_token' => Str::random(10),
        //'created_at' => now(), optional auto completed 
        //'updated_at' => now(), optional auto completed 
    ];
});
    
    
    
    