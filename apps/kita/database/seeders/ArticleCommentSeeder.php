<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //インスタンス化とデータ取得
        $faker = Faker::create('ja_JP');
        $members = Member::all();
        $articles = Article::all();

        //コメントデータを格納する配列
        $comments = [];

        //データ生成
        foreach ($articles as $article) {
            $comments[] = [
                'contents' => $faker->realText(200), // ランダムなコメント内容（200文字まで）
                'member_id' => $members->random()->id, // ランダムなメンバーID
                'article_id' => $articles->random()->id, // ランダムな記事ID
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        //データ挿入
        DB::table('article_comments')->insert($comments);
    }
}
