<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $TB_NAME = 'service';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return response($services, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        // validate that all the fields are not empty
        $request->validate([
            'user_id'    => 'required',
            'title'    => 'required',
            'content'  => 'required',
            'image'    => 'required',
            'ref'      => 'required',
        ]);

        // Create a new model
        Service::create([
            'user_id'   => $request->user_id,
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $request->image,
            'ref'     => '#',
        ]);

        return response('Service successfully added', 200, ['application/json']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find service using the id -- soft delete
        Service::find($id)->update([
            'is_deleted'  => true
        ]);

        return response('Service successfully deleted', 200, ['application/json']);
    }
}
