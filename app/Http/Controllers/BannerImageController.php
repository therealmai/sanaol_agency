<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use Illuminate\Http\Request;

class BannerImageController extends Controller
{
    private $MSG_ERR_ID_NOT_FOUND = 'ID did not match any of the data found in database.';
    private $MSG_ERR_ADDITIONAL_PROPS = 'Model does not contain properties found in request';
    private $MSG_SUC_ID_FOUND = 'Data found.';
    private $MSG_SUC_UPDATE = 'Data successfully updated.';

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
     * Creates a new hero banner image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Display the specified hero banner image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Updates existing hero banner image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    public function destroy($id)
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
