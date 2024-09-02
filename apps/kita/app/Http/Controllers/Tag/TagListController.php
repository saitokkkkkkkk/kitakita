<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Services\Tag\TagSearchService;
use Illuminate\Http\Request;

class TagListController extends Controller
{
    protected $tagSearchService;

    /**
     * Constructor for TagListController.
     *
     * @param TagSearchService $tagSearchService
     */
    public function __construct(TagSearchService $tagSearchService)
    {
        $this->tagSearchService = $tagSearchService;
    }

    /**
     * Search the tags.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // リクエストからtag取得
        $tag = $request->input('tag');

        // サービスクラスで検索ロジックを実行
        $articleTags = $this->tagSearchService->getTags($tag);

        // ビューにデータを渡して表示
        return view('tag.index', compact('articleTags'));
    }
}
