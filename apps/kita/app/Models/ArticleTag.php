<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'article_tags';

    // マスアサインメント可能な属性
    protected $fillable = [
        'name',
    ];

    // リレーションシップ
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_article_tag', 'article_tag_id', 'article_id');
    }
}
