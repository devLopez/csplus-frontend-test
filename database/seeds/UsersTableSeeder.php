<?php

use Illuminate\Database\Seeder;
use Spa\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run() : void
    {
        factory(User::class)->create();
    }
}
