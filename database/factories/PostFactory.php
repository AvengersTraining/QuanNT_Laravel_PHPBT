<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->text(20);
    $slugTitle = str_slug($title, '-');

    return [
        'category_id' => Category::all()->random()->id,
        'title' => $title,
        'content' => $faker->paragraph,
        'slug' => $slugTitle,
        'status' => 1,
    ];
});
