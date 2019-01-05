<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Resources\ToolResource;
use App\Tool;

class StoreToolController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreToolRequest $request
     * @return ToolResource
     */
    public function __invoke(StoreToolRequest $request)
    {
        $tool = Tool::create($request->all());

        return new ToolResource($tool);
    }
}
