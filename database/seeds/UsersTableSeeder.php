<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->create()->each(function ($user) {
            $user->posts()->createMany(factory(Post::class, 100)->make([
                'postable_id' => $user->id,
                'postable_type' => User::class,
            ])->toArray());
        });
    }
}
