<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\PreviewEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreviewEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = DB::table('events')
                    ->leftJoin('preview_events', 'events.id', '=', 'preview_events.events_id')
                    ->where('events.is_deleted', '!=', 1)
                    ->where('preview_events.events_id', '=', null)
                    ->limit(3)
                    ->get(['events.id', 'events.title']);

        $previewEvents = PreviewEvent::limit(3)
                            ->get();

        foreach($previewEvents as $pn) {
            $events->add(Event::find($pn->getAttribute('events_id'), ['id', 'title']));
        }

        $data = [
            "previewData" => $previewEvents,
            "data" => $events
        ];

        return response($data, 200, ['application/json']);
    }

    public function getFeaturedEvents()
    {
        $previewEvents = PreviewEvent::all();
        $previewEvents = $previewEvents->slice(0, 3);
        $events = collect();

        foreach($previewEvents as $pn) {
            $events->add(Event::find($pn->getAttribute('events_id')));
        }

        $data = [
            "previewEvents" => $previewEvents,
            "events" => $events
        ];

        return response($events, 200, ['application/json']);
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
        $arr = $request->input();

        for($x = 1; $x <= count($arr); $x++) {
            $prev = PreviewEvent::find($x);
            $prev->news_id = $arr[$x-1];
            $prev->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();
            $prev->save();
        }

        $data = [
            'arr' => $arr
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
        $previewEvent = PreviewEvent::findOrFail($id);
        $previewEvent->is_deleted = true;

        if($previewEvent->save()) {
            return response("Succesfully saved data!", 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }
}
