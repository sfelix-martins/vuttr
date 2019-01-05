<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetToolsRequest;
use App\Http\Resources\ToolResource;
use App\Tool;
use Illuminate\Support\Collection;

class GetToolsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param GetToolsRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(GetToolsRequest $request)
    {
        $tools = $this->findTools($request->input('tag'));

        return ToolResource::collection($tools);
    }

    /**
     * Find tools filtering by tag if exists.
     *
     * @param string|null $tag
     * @return Collection
     */
    private function findTools(?string $tag): Collection
    {
        if ($tag) {
            return Tool::whereJsonContains('tags', $tag)->get();
        }

        return Tool::all();
    }
}
