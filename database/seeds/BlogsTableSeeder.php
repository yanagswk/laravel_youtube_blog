<?php
/**
 * seeder
 * テストデータをデータベースに登録できるクラス
 */

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * データベースにデータを追加する
     *
     * @return void
     */
    public function run()
    {
        // テストデータを15個作成
        factory(Blog::class, 15)->create();
    }
}
