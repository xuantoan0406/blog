<?php

use Illuminate\Support\Facades\DB;
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
        // $this->call(UpNewchapSeed::class);
        //$this->call(UpNewStory::class);

        DB::table('review_stories')->insert([
            "stories_id" => 23,
            "content" => "ẹ nói hai phút nữa mà chị không xuống là cầm roi lên quất vào mông chị đấy! - Lăng Nhã Linh chống nạnh nhìn Lăng Từ Nhật, rồi lại nhìn sang đồng hồ, quả thật là không muốn dậy sao?... 
            Về Lăng Từ Nhật, sau khi nghe hai từ mẹ yêu sắp lên mà lột xá"
        ]);
    }
}
