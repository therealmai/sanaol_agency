<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function create(Request $request)
    {
        $news = new News();

        $news->user_id = $request->input('user_id');
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->author = $request->input('author');
        $news->ref = $request->input('ref');
        $news->image = $request->input('image');
        $news->save();

        return response()->json($news);
    }

    public function read()
    {
        $news = News::all();

        return response()->json($news);
    }

    public function show(Request $request)
    {
        $news = News::findOrFail($request->id);

        return response()->json($news);
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'user_id'   => 'required',
            'title'     => 'required',
            'content'   => 'required',
            'image'     => 'required',
            'author'    => 'required',
            'ref'       => 'required'
        ]);

        $news = News::findOrFail($request->id);

        $news->title    = $request->title;
        $news->image    = $request->image;
        $news->content  = $request->content;
        $news->author   = $request->author;
        $news->ref      = $request->ref;
        $news->save();

        return response()->json([
            'status' => 200,
            'message' => "Update Success",
            'news' => $news
        ]);
    }

    public function delete(Request $request) 
    {
        $news = News::findOrFail($request->id);
        $news->is_deleted = true;
        $news->save();

        return response()->json([
            'status' => 200,
            'message' => "Delete Success",
            'news' => $news
        ]);
    }
}
