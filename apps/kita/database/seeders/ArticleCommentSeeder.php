<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArticleCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // インスタンス化とデータ取得
        $faker = Faker::create('ja_JP');
        $members = Member::all();
        $articles = Article::all();

        // コメントデータの生成
        foreach ($articles as $article) {
            // 1記事に対してランダムな数のコメントを生成（1~5）
            $numberOfComments = rand(1, 5);

            for ($i = 0; $i < $numberOfComments; $i++) {
                $comment = new ArticleComment();
                $comment->contents = $faker->realText(200);
                $comment->member_id = $members->random()->id;
                $comment->article_id = $article->id;
                $comment->save(); // ここでcreated_atとupdated_atが自動設定
            }
        }
    }
}
