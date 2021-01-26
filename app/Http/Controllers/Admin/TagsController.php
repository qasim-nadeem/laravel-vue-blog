<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Services\Admin\TagsService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TagsController extends BaseController
{
    /**
     * @var TagsService
     */
    private $service;

    /**
     * TagsController constructor.
     * @param TagsService $service
     */
    public function __construct(TagsService $service)
    {
        $this->service = $service;
    }

    public function tags()
    {
        return Tag::all();
    }

    public function createTag(Request $request)
    {
        return $this->service->createTag($request->input('tagName'));
    }

    public function editTag(Request $request)
    {
        return $this->service->editTag($request->input('tagName'),$request->input('id'));
    }
}
