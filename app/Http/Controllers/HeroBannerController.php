<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\HeroBanner;
use App\Models\BannerImage;
use Illuminate\Http\Request;

class HeroBannerController extends Controller
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
        $banner = HeroBanner::all();

        return response($banner, 200, ['application/json']);
    }

    /**
     * Creates a new hero banner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
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
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }

    /**
     * Display the specified hero banner.
     *
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = HeroBanner::find($id);

        if($banner) {
            return response($this->generateRes($banner, 200, $this->MSG_SUC_ID_FOUND), 200, ['application/json']);
        } else {
            return response($this->generateRes($banner, 400, $this->MSG_ERR_ID_NOT_FOUND), 400, ['application/json']);
        }
    }

    /**
     * Updates existing hero banner.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'header_tal' => 'required|max:255',
            'subheader_tal' => 'required|max:255',
            'header_gen' => 'required|max:255',
            'subheader_gen' => 'required|max:255'
        ]);

        $banner = HeroBanner::findOrFail($id);
        // $banner->fill($request->except(['user_id']));
        // $banner->user_id = $request->user_id;

        if($request->hasFile('image')) {
            $pathToFile = $request->file('image')
                ->store('HeroBanner', 'vue');
            $banner->image = $pathToFile;
        }

        $banner->header_tal = $request->input('header_tal');
        $banner->subheader_tal = $request->input('subheader_tal');
        $banner->header_gen = $request->input('header_gen');
        $banner->subheader_gen = $request->input('subheader_gen');
        $banner->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();
        $banner->save();

        $msg = $this->MSG_SUC_UPDATE;
        $status = 200;
        return response($this->generateRes($banner, $status, $msg), 200);
    }

    /**
     * Deletes existing hero banner.
     *
     * @param [type] $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = HeroBanner::findOrFail($id);
        $banner->is_deleted = true;

        if($banner->save()) {
            return response("Succesfully saved data!", 200, ['application/json']);
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
