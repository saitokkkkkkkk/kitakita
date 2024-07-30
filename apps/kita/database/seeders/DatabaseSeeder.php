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
        // ArticleTagSeederを最初に実行してタグデータを作成
        $this->call(ArticleTagSeeder::class);

        //
        $this->call(MembersTableSeeder::class);

        // ArticlesTableSeederを次に実行して記事データを作成
        $this->call(ArticlesTableSeeder::class);

        // 最後に中間テーブルのシーダーを実行
        $this->call(ArticleArticleTagSeeder::class);
    }
}
