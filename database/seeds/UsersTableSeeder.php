<?php

use Illuminate\Database\Seeder;
use Spa\Models\Post;
use Spa\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run() : void
    {
        factory(User::class, 2)->create()->each(function ($user)
        {
            factory(Post::class, 10)->make([
                'user_id' => $user->id
            ]);
        });
    }
}
