<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Services\Tag\TagCreateService;

class CreateTagController extends Controller
{
    /**
     * @var TagCreateService
     */
    protected $tagCreateService;

    /**
     * CreateTagController constructor.
     *
     * @param TagCreateService $tagCreateService
     */
    public function __construct(TagCreateService $tagCreateService)
    {
        $this->tagCreateService = $tagCreateService;
    }

    /**
     * Show the view for creating a tag.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('tag.create');
    }

    /**
     * Store the tag.
     *
     * @param StoreTagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTagRequest $request)
    {
        $articleTag = $this->tagCreateService->store($request);

        return redirect()->route('admin.tags.edit', $articleTag)
            ->with(['success' => '登録が完了しました']);
    }
}
