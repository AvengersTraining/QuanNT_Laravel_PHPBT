<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        User::all()->each(function ($user) use ($posts) {
            $user->reactedPosts()->attach($posts->random()->id, [
                'type' => rand(0, 1)
            ]);
        });
    }
}
