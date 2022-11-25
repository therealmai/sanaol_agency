<?php

namespace App\Http\Controllers;

use App\Models\UserImage;
use Illuminate\Http\Request;

class UserImageController extends Controller
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
     * Store a newly created resource in storage.
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
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserImage  $userImage
     * @return \Illuminate\Http\Response
     */
    public function show(UserImage $userImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserImage  $userImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserImage $userImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserImage  $userImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserImage $userImage)
    {
        //
    }
}
