<?php

namespace Database\Seeders;

use App\Models\ArticleTag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Technology',
            'Health',
            'Science',
            'Education',
            'Entertainment',
            'Travel',
            'Lifestyle',
            'Business',
            'Sports',
            'Food',
        ];

        foreach ($tags as $tag) {
            ArticleTag::create([
                'name' => $tag,
            ]);
        }
    }
}
