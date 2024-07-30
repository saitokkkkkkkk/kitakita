<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleArticleTagSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // すべてのタグを取得
        $tags = ArticleTag::all();

        // すべての記事を取得
        $articles = Article::all();

        foreach ($articles as $article) {
            // ランダムにタグを選択
            $randomTags = $tags->random(rand(1, 5)); // 1〜5個のタグを選択

            foreach ($randomTags as $tag) {
                DB::table('article_article_tag')->insert([
                    'article_id' => $article->id,
                    'article_tag_id' => $tag->id,
                ]);
            }
        }
    }
}
