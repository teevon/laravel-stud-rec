<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company_id' => factory(\App\Company::class)->create(),
        'email' =>  $faker->unique()->safeEmail,
        'title' => 'Cus',
        'active' => 1,
    ];
});
