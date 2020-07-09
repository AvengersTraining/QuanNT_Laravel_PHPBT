<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tag;
use App\Models\User;
use App\Models\Admin;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $tagable = [
        User::class,
        Admin::class,
    ];
    $tagableType = $faker->randomElement($tagable);

    return [
        'taggable_id' => $tagableType::all()->random()->id,
        'taggable_type' => $tagableType,
        'name' => $faker->name,
    ];
});
