<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run() : void
    {
        $this->call(UsersTableSeeder::class);
    }
}
