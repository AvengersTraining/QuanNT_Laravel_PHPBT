<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->title;
    $slug = str_slug($name, '-');

    return [
        'admin_id' => Admin::all()->random()->id,
        'name' => $name,
        'slug' => $slug,
    ];
});
