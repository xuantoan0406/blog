<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\models\Chaps;


class UpNewchapSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chaps::create([
            "stories_id" => Str::random(10),
            "chap" => 4,
            "timeUpdate" => "2019/01/11",
        ]);
    }
}
