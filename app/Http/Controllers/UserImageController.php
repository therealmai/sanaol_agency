<?php

namespace App\Http\Controllers;

use App\Models\UserImage;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'user_id' => 'required',
            'image' => 'required',
        ]);

        $userImage = new UserImage;
        $userImage->fill($request->except(['user_id']));
        $userImage->user_id = $request->user_id;
        

        if($userImage->save()) {
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
    public function show($id)
    {
        $userImage = UserImage::where('user_id', $id)->get();

        if(!$userImage->isEmpty()) {
            return response($this->generateRes($userImage, 200, $this->MSG_SUC_ID_FOUND), 200, ['application/json']);
        } else {
            return response($this->generateRes($userImage, 400, $this->MSG_ERR_ID_NOT_FOUND), 400, ['application/json']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserImage  $userImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'image' => 'required',
        ]);

        $userImage = UserImage::find($id);
        $userImage->fill($request->except(['user_id']));
        $userImage->user_id = $request->user_id;
        $userImage->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();

        if($userImage->save()) {
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserImage  $userImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $userImage = UserImage::find($id);
        $userImage->is_deleted = true;
        $userImage->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();

        if($userImage->save()) {
            return response("Succesfully deleted data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }

    public function generateRes($data, $status, $msg) {
        $res = [
            'data' => $data,
            'status' => $status,
            'msg' => $msg
        ];
        return $res;
    }
}
