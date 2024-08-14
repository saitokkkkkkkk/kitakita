<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 最初にタグデータ作成
        $this->call(ArticleTagSeeder::class);

        // メンバーも先に作成
        $this->call(MembersTableSeeder::class);

        // 次に記事データ入れる
        $this->call(ArticlesTableSeeder::class);

        // 最後に中間テーブルのシーダー実行
        $this->call(ArticleArticleTagSeeder::class);

        // コメントデータの生成
        $this->call(ArticleCommentSeeder::class);
    }
}
