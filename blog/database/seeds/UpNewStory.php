<?php

use Illuminate\Database\Seeder;
use App\models\Story;

use Illuminate\Support\Str;

class UpNewStory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Story::create([
            "nameStory" => Str::random(10),
            "author" => Str::random(10) . '@gmail.com',
            "chap" => 20,
            "status" => "roi",
            "timeUpdate" => "2019/01/11",
            "catelogy" => "dd",
            "img" => '',

        ]);
    }
}
