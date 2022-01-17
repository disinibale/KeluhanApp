<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customers;
use App\Models\Complaints;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Customers::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'address' => $this->faker->address(),
        'phone' => $this->faker->phoneNumber()
    ];
});

$factory->define(Complaints::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'message' => $this->faker->text(200),
        'status' => $this->faker->randomElement($array)
    ];
});