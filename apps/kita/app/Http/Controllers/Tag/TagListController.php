<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Services\Tag\TagSearchService;
use Illuminate\Http\Request;

class TagListController extends Controller
{
    protected $tagSearchService;

    public function __construct(TagSearchService $tagSearchService)
    {
        $this->tagSearchService = $tagSearchService;
    }

    public function index(Request $request)
    {
        $tag = $request->input('tag');

        // サービスクラスで検索ロジックを実行
        $articleTags = $this->tagSearchService->getTags($tag);

        // ビューにデータを渡して表示
        return view('tag.index', compact('articleTags'));
    }
}
