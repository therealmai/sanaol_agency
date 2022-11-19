<?php

namespace App\Http\Controllers;

use App\Models\HeroBanner;
use Illuminate\Http\Request;

class HeroBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Create a new hero banner with default values.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBanner(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'header_tal' => 'required|max:255',
            'subheader_tal' => 'required|max:255',
            'header_gen' => 'required|max:255',
            'subheader_gen' => 'required|max:255',
            'preview_events' => 'required',
            'preview_news' => 'required'
        ]);

        $banner = new HeroBanner;
        $banner->fill($request->except(['user_id']));
        $banner->user_id = $request->user_id;

        if($banner->save()) {
            return response()->json($banner, 200);
        } else {
            return response()->json("Error in saving data", 400);
        }
    }

    /**
     * Update existing hero banner.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function updateBanner(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'header_tal' => 'required|max:255',
            'subheader_tal' => 'required|max:255',
            'header_gen' => 'required|max:255',
            'subheader_gen' => 'required|max:255',
            'preview_events' => 'required',
            'preview_news' => 'required'
        ]);

        $banner = HeroBanner::findOrFail($id);
        $banner->fill($request->except(['user_id']));
        $banner->user_id = $request->user_id;

        if($banner->save()) {
            return response()->json($banner, 200);
        } else {
            return response()->json("Error in saving data", 400);
        }
    }

    /**
     * Delete existing hero banner.
     *
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBanner($id)
    {
        $banner = HeroBanner::findOrFail($id);
        $banner->is_deleted = true;

        if($banner->save()) {
            return response()->json($banner, 200);
        } else {
            return response()->json("Error in saving data", 400);
        }
    }
}
