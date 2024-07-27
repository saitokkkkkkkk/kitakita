<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpCsFixer\DocBlock\Tag;

class Article extends Model
{

    use HasFactory, SoftDeletes;

    //マスアサインメント可能
    protected $fillable = [
        'title',
        'contents',
        'member_id',
    ];

    //リレーション
    function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    function tags()
    {
        return $this->belongsToMany(ArticleTag::class, 'article_article_tag', 'article_id', 'article_tag_id');
    }
}
