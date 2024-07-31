<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    //マスアサインメント可能
    protected $fillable = [
        'title',
        'contents',
        'member_id',
    ];

    /**
     * Get the member that owns the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    //リレーション
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * The tags that belong to the article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(ArticleTag::class, 'article_article_tag', 'article_id', 'article_tag_id');
    }
}
