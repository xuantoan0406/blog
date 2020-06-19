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
        // $this->call(UpNewchapSeed::class);
        //$this->call(UpNewStory::class);
        DB::table('chaps')->insert([
            "stories_id" => 5,
            "chap" => 4,
            "content" => "- Năm phút nữa... - Lăng Từ Nhật thò bàn tay năm ngón ra khỏi chăn, nói giọng ngái ngủ. Lăng Nhã Linh hết cả đổ mồ hôi hột với bà chị lười chảy thây này, đã mười lần cái năm phút của Lăng Từ Nhật rồi mà quả thật cô nàng còn chưa ló mặt mà thấy ánh bình minh...
            - Chị à! Dậy đi! Mẹ nói hai phút nữa mà chị không xuống là cầm roi lên quất vào mông chị đấy! - Lăng Nhã Linh chống nạnh nhìn Lăng Từ Nhật, rồi lại nhìn sang đồng hồ, quả thật là không muốn dậy sao?... 
            Về Lăng Từ Nhật, sau khi nghe hai từ mẹ yêu sắp lên mà lột xác thì cũng ''miễn cưỡng'' ngồi dậy, ngáp một cái thật dài, Lăng Nhã Linh nhìn chị mình lắc đầu...
            -Nhanh lên nào! Để em soạn đồng phục, cho chị hai phút để đánh răng đấy nhé!",
            "timeUpdate" => "2019/01/11",
        ]);

        DB::table("stories")->insert([
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
