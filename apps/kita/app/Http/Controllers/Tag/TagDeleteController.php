<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;
use App\Services\Tag\TagDeleteService;

class TagDeleteController extends Controller
{
    private $TagDeleteService;

    /**
     * Constructor for TagDeleteController.
     * @param TagDeleteService $TagDeleteService
     */
    public function __construct(TagDeleteService $TagDeleteService)
    {
        $this->TagDeleteService = $TagDeleteService;
    }

    /**
     * Delete the tag.
     *
     * @param ArticleTag $articleTag
     * @return void
     */
    public function destroy(ArticleTag $articleTag)
    {
        $this->TagDeleteService->destroy($articleTag);

        //あとでリダイレクト先の追加
    }
}
