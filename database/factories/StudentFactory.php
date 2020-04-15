<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentProfile;
use Faker\Generator as Faker;

$factory->define(StudentProfile::class, function (Faker $faker) {
    return [ 
    	'user_id' => \App\User::create([
            'first_name' => $faker->firstName,
            'middle_name' => $faker->lastName,
            'last_name' => $faker->lastName,
            'is_student' => 1,
            'email' => $faker->unique()->safeEMail,
            'mobile' => $faker->randomElement(['0927', '0936', '0918', '0916']) . random_int(1000000, 9999999),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]),
        'student_id' => random_int(2015, 2019) . random_int(1000, 9999),
        'course_id' => random_int(1, 9),
    ];
});

      