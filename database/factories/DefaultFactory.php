<?php

$factory->defineAs(App\User::class, 'admin', function () {
    static $password;
    return [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => $password ?: $password = bcrypt('password'),
        'role_id' => factory('App\Role', 'admin')->create()->id
    ];
});

$factory->defineAs(App\User::class, 'simple', function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'role_id' => factory('App\Role', 'simple')->create()->id
    ];
});

$factory->defineAs(App\Role::class, 'admin', function () {
    return [
        'id' => 1,
        'title' => 'Administrator',
    ];
});

$factory->defineAs(App\Role::class, 'simple', function () {
    return [
        'id' => 2,
        'title' => 'Simple user',
    ];
});