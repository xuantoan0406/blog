<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('stories')->insert([
            "nameStory" => Str::random(10),
            "author" => Str::random(10) . '@gmail.com',
            "chap" => 20,
            "status" => "chua",
            "timeUpdate" => "2019/01/11",
            "catelogy" => "dd"

        ]);
    }
}
