<?php

namespace App\Http\Controllers;

use App\Models\HeroBanner;
use App\Models\BannerImage;
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
     * Creates a new hero banner.
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
            return response()->json("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response()->json("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Updates existing hero banner.
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
            return response()->json("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response()->json("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Deletes existing hero banner.
     *
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBanner($id)
    {
        $banner = HeroBanner::findOrFail($id);
        $banner->is_deleted = true;

        if($banner->save()) {
            return response()->json("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response()->json("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Creates a new hero banner image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBannerImage(Request $request)
    {
        $validated = $request->validate([
            'hero_id' => 'required',
            'image' => 'required|max:255',
        ]);

        $bannerImage = new BannerImage;
        $bannerImage->fill($request->except(['hero_id']));
        $bannerImage->hero_id = $request->hero_id;

        if($bannerImage->save()) {
            return response()->json("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response()->json("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Updates existing hero banner image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function updateBannerImage(Request $request, $id)
    {
        $validated = $request->validate([
            'hero_id' => 'required',
            'image' => 'required|max:255',
        ]);

        $bannerImage = BannerImage::findOrFail($id);
        $bannerImage->fill($request->except(['hero_id']));
        $bannerImage->hero_id = $request->hero_id;

        if($bannerImage->save()) {
            return response()->json("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response()->json("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Deletes existing hero banner image.
     *
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBannerImage($id)
    {

        $bannerImage = BannerImage::findOrFail($id);
        $bannerImage->is_deleted = true;

        if($bannerImage->save()) {
            return response()->json("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response()->json("Error in saving data", 400, ['application/json']);
        }
    }
}
