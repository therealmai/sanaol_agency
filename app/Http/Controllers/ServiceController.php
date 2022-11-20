<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $TB_NAME = 'services';
    private $MSG_ERR_ID_NOT_FOUND = 'ID did not match any of the service found in database.';
    private $MSG_ERR_ADDITIONAL_PROPS = 'Model does not contain properties found in request';
    private $MSG_SUC_ID_FOUND = 'Service found.';
    private $MSG_SUC_UPDATE = 'Service successfully updated.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return response($services, 200, ['application/json']);
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
        //
    }

    /**
     * Get one service by id
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $service = Service::find($id);
        $msg = '';
        $status = '';
        
        if($service == NULL) {
            $msg = $this->MSG_ERR_ID_NOT_FOUND;
            $status = 404;
        } else {
            $msg = $this->MSG_SUC_ID_FOUND;
            $status = 200;
        }

        return response($this->generateRes($service, $status, $msg), 200, ['application/json']);
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
        $service = Service::find($id);
        $input = $request->input();
        $msg = '';
        $status = '';
        $err = false;

        if($service == NULL) {
            $msg = $this->MSG_ERR_ID_NOT_FOUND;
            $status = 404;
        } 

        if($service != NULL) {
            foreach($input as $key => $val) {
                if(isset($service[$key])) {
                    $service[$key] = $val;
                } 
                else {
                    $err = true;
                    break;
                }
            }  
        }

        if($err) {
            $msg = $this->MSG_ERR_ADDITIONAL_PROPS;
            $status = 500;
            $service = null;
        } else {
            $msg = $this->MSG_SUC_UPDATE;
            $status = 204;
            $service->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();
            $service->save();
        }

        return response($this->generateRes($service, $status, $msg), 200, ['application/json']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
