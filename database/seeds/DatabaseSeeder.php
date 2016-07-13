<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User',
            'username' => 'username',
            'email' => 'your@email.com',
            'password' => bcrypt('passw0rd'),
        ]);
    }
}
