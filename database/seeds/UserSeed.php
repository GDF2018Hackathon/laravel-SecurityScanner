<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'klenzo',
        	'github_id' => 10270234,
        	'email' => 'crea2luxe@gmail.com',
        	'password' => bcrypt('123456789'),
        ]);

    }
}
