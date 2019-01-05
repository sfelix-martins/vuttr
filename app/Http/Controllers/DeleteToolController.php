<?php

namespace App\Http\Controllers;

use App\Tool;
use Illuminate\Http\Response;

class DeleteToolController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param int $id
     * @return Response
     */
    public function __invoke(int $id)
    {
        Tool::findOrFail($id)->delete();

        return response('', 204);
    }
}
