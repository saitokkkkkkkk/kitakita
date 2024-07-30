<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // メンバーのIDリストを取得
        $memberIds = Member::pluck('id')->toArray();

        // 70個のデータを作成するループ
        $articles = [];
        for ($i = 1; $i <= 70; $i++) {
            $articles[] = [
                'title' => 'Article Title ' . $i,
                'contents' => 'Contents of article number ' . $i . '. This is a sample content for testing purposes.',
                'member_id' => $memberIds[array_rand($memberIds)], // ランダムにメンバーIDを選択
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // データベースにデータを挿入
        DB::table('articles')->insert($articles);
    }
}
