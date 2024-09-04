<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Models\ArticleTag;
use App\Services\Tag\TagUpdateService;

class TagUpdateController extends Controller
{
    /**
     * The TagUpdateService instance.
     *
     * @var TagUpdateService
     */
    protected $updateTagService;

    /**
     * TagUpdateController constructor.
     *
     * @param TagUpdateService $updateTagService
     */
    public function __construct(TagUpdateService $updateTagService)
    {
        $this->updateTagService = $updateTagService;
    }

    /**
     * Show the form for updating the specified tag.
     *
     * @param ArticleTag $articleTag
     * @return \Illuminate\Contracts\View\View
     */
    public function show(ArticleTag $articleTag)
    {
        return view('tag.edit', compact('articleTag'));
    }

    /**
     * Update the specified tag.
     *
     * @param StoreTagRequest $request
     * @param ArticleTag $articleTag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreTagRequest $request, ArticleTag $articleTag)
    {
        $this->updateTagService->update($request, $articleTag);

        return redirect()->route('admin.tags.edit', $articleTag)
            ->with(['success' => '更新処理が完了しました']);
    }
}
