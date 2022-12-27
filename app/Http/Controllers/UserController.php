<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    private $MSG_ERR_ID_NOT_FOUND = 'ID did not match any of the user found in database.';
    private $MSG_ERR_ADDITIONAL_PROPS = 'Model does not contain properties found in request';
    private $MSG_SUC_ID_FOUND = 'User found.';
    private $MSG_SUC_UPDATE = 'User successfully updated.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('is_deleted', 0)->get();

        if(isset($user)){
            return response()->json($user, 200, ['application/json']);
        }
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
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'insta_handle' => 'max:255'
        ]);
      
        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'insta_handle' => $request->insta_handle,
            'user_type' => $request->user_type,
            'is_member' => $request->is_member
        ]);
        
        return response()->json("User stored successfully", 200, ['application/json']);
    }

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $msg = '';
        $status = '';
    
        if(isset($user)){
            $msg = $this->MSG_SUC_ID_FOUND;
            $status = 200;
        }else{
            $msg = $this->MSG_ERR_ID_NOT_FOUND;
            $status = 404;
        }

        return response($this->generateRes($user, $status, $msg), 200, ['application/json']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $msg = '';
        $status = '';
        $err = false;

        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'insta_handle' => 'max:255'
        ]);

        
        if(!isset($user)){
            $msg = $this->MSG_ERR_ID_NOT_FOUND;
            $status = 404;
        }

        $user->fill($request->except(['id']));

        if($user){
            $msg = $this->MSG_SUC_UPDATE;
            $status = 204;
            $user->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();
            $user->save();
        }else{
            $msg = $this->MSG_ERR_ADDITIONAL_PROPS;
            $status = 500;
            $user = null;
        }

        return response($this->generateRes($user, $status, $msg), 200, ['application/json']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        User::findOrFail($id)->update([
            'is_deleted'  => true
        ]);

        return response('User successfully deleted', 200, ['application/json']);
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
