<?php

use Illuminate\Database\Seeder;

class ReportSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            'code' => str_random(10),
            'repo_id' => uniqid(),
            'email' => str_random(10).'@gmail.com',
            'user_id' => 1,
            'content' => file_get_contents(storage_path('reports/generated.json')),
        ]);

    }
}
