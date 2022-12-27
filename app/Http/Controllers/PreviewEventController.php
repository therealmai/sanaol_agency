<?php

namespace App\Http\Controllers;

use App\Models\PreviewEvent;
use Illuminate\Http\Request;

class PreviewEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $previewEvents = PreviewEvent::all();

        return response($previewEvents, 200, ['application/json']);
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
            'event_id' => 'required',
        ]);

        $previewEvent = new PreviewEvent;
        $previewEvent->event_id = $request->event_id;

        if($previewEvent->save()) {
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
        $previewEvent = PreviewEvent::find($id);

        return response($previewEvent, 200, ['application/json']);
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
            'event_id' => 'required',
        ]);

        $previewEvent = PreviewEvent::findOrFail($id);
        $previewEvent->event_id = $request->event_id;

        if($previewEvent->save()) {
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
        $previewEvent = PreviewEvent::findOrFail($id);
        $previewEvent->is_deleted = true;

        if($previewEvent->save()) {
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }
}
