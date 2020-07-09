<?php

use App\Models\Admin;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class, 2)->create();
    }
}
