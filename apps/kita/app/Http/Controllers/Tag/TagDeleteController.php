<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\ArticleTag;
use App\Services\Tag\TagDeleteService;

class TagDeleteController extends Controller
{
    private $tagDeleteService;

    /**
     * Constructor for TagDeleteController.
     * @param TagDeleteService $tagDeleteService
     */
    public function __construct(TagDeleteService $tagDeleteService)
    {
        $this->tagDeleteService = $tagDeleteService;
    }

    /**
     * Delete the tag.
     *
     * @param ArticleTag $articleTag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ArticleTag $articleTag)
    {
        $this->tagDeleteService->destroy($articleTag);

        return redirect()->route('admin.tags.index')
            ->with('success', '削除処理が完了しました');
    }
}
