<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getAll()
    {
        //dd(Auth::user());
        $content = Content::all();
        return view('Content', compact('content'));
    }

    public function createContent()
    {
        return view('Create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'summary' => 'required|min:10',
            "description" => 'required'
        ]);
        $content = new Content;
        $content->title = $request->title;
        $content->summary = $request->summary;
        $content->description = $request->description;
        $content->save();

        return to_route("newContent");
    }

    public function edit($id)
    {
        return view('edit', [
            'content' => Content::findOrFail($id)
        ]);
    }

    public function delete($id)
    {
        $content = Content::find($id);
        $content->delete();
        return to_route("content");
    }

    public function update(Request $request)
    {
        $content = Content::find($request->idcont);
        $content->title = $request->title;
        $content->summary = $request->summary;
        $content->description = $request->description;
        $content->save();

        return to_route("content");
    }
}
