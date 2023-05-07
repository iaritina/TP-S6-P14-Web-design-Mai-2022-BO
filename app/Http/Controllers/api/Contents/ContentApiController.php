<?php

namespace App\Http\Controllers\Api\Contents;

use App\Http\Resources\ContentResources;
use App\Models\Content;
use App\Http\Controllers\Controller;

class ContentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContentResources::collection(Content::all());
    }



    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return new ContentResources(Content::findOrFail($id));
    }
}
