<?php

namespace App\Http\Controllers;

use App\Models\PreviewNews;
use Illuminate\Http\Request;

class PreviewNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $previewNews = PreviewNews::all();

        return response($previewNews, 200, ['application/json']);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'news_id' => 'required',
        ]);

        $previewNews = PreviewNews::findOrFail($id);
        $previewNews->news_id = $request->news_id;

        if($previewNews->save()) {
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
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
