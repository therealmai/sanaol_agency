<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\PreviewNews;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PreviewNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')
                    ->leftJoin('preview_news', 'news.id', '=', 'preview_news.news_id')
                    ->where('news.is_deleted', '!=', 1)
                    ->where('preview_news.news_id', '=', null)
                    ->limit(3)
                    ->get(['news.id', 'news.title']);

        $previewNews = PreviewNews::limit(3)
                            ->get();

        foreach($previewNews as $pn) {
            $news->add(News::find($pn->getAttribute('news_id'), ['id', 'title']));
        }

        $data = [
            "previewNews" => $previewNews,
            "news" => $news
        ];

        return response($data, 200, ['application/json']);
    }

    public function getFeaturedNews()
    {
        $previewNews = PreviewNews::all();
        $previewNews = $previewNews->slice(0, 3);
        $news = collect();

        foreach($previewNews as $pn) {
            $news->add(News::find($pn->getAttribute('news_id')));
        }

        $data = [
            "previewNews" => $previewNews,
            "news" => $news
        ];

        return response($news, 200, ['application/json']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'news_id' => 'required',
        ]);

        $previewNews = new PreviewNews;
        $previewNews->news_id = $request->news_id;

        if($previewNews->save()) {
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $previewNews = PreviewNews::find($id);

        return response($previewNews, 200, ['application/json']);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $arr = $request->input();

        for($x = 1; $x <= count($arr); $x++) {
            $prev = PreviewNews::find($x);
            $prev->news_id = $arr[$x-1];
            $prev->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();
            $prev->save();
        }

        $data = [
            'arr' => $arr,
            'try' => $arr[0],
            'prev' => $prev
        ];

        return response($data, 200, ['application/json']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $previewNews = PreviewNews::findOrFail($id);
        $previewNews->is_deleted = true;

        if($previewNews->save()) {
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }
}
