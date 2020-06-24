<?php

use Illuminate\Database\Seeder;
use Spa\Models\{Post, User};

class UsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run() : void
    {
        factory(User::class, 2)->create()->each(function ($user)
        {
            factory(Post::class, 10)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
