<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Complaint;
use Faker\Generator as Faker;

$factory->define(Complaint::class, function (Faker $faker) {
    $result = '';
    for($i = 0; $i < 9; $i++) {
        $result .= mt_rand(0, 9);
    }
    return [
        'name' => $faker->name,
        'account_number'=>$faker->numberBetween($min = 1200, $max = 50000),
        'zone' => $faker->randomElement(['mazimbu', 'mindu', 'sabasaba', 'kihonda', 'boma', 'msanvu']),
        // 'gender' => $faker->randomElement(['M', 'F']),
        'phone' => '+255'.$result,
        'complaint_type' => $faker->randomElement(['high bill', 'no water service', 'meter defaults', 'leackage']),
        'report_medium' => $faker->randomElement(['phone', 'direct', 'website', 'leackage']),
        'complaint_priority' => $faker->randomElement(['high', 'medium', 'low']),
        'status' => $faker->randomElement(['new', 'completed']),
        'description' => $faker->sentence,
        'created_at' => '2020-'.$faker -> date('m-d H:i:s'),
    ];
});
