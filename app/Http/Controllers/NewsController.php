<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
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
