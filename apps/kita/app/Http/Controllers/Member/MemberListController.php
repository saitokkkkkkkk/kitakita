<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Services\Member\MemberSearchService;
use Illuminate\Http\Request;

class MemberListController extends Controller
{
    protected $memberSearchService;

    /**
     * Constructor for MemberListController.
     *
     * @param MemberSearchService $memberSearchService
     */
    public function __construct(MemberSearchService $memberSearchService)
    {
        $this->memberSearchService = $memberSearchService;
    }

    /**
     *Display a list of members.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $members = $this->memberSearchService->search($request);

        return view('member.index', compact('members'));
    }
}
