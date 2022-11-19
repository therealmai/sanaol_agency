<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        if(isset($user)){
            return response()->json($user, 200);
        }else{
            return response()->json("Error", 400);
        }
    }

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request){

        $user = User::findOrFail($request->id);
    
        if($user){
            return response()->json($user, 200);
        }else{
            return response()->json("Error", 400);
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
        $user = new User;
        
        $validated = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'insta_handle' => 'max:255'
        ]);
      
        if ($validated) {
            $user = User::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'insta_handle' => $request->insta_handle,
                'user_type' => $request->user_type,
                'is_member' => $request->is_member
            ]);

            if($user->save()){
                return response()->json($user, 200);
            }else{
                return response()->json("Error", 400);
            }
        }else{
            return response()->json("Validation Failed", 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
        
        $validated = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'insta_handle' => 'max:255'
        ]);

        $user = User::findOrFail($id);
        $user->fill($request->except(['id']));

        if($user){
            return response()->json($user, 200);
        }else{
            return response()->json("Error", 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $user = User::findOrFail($id);

        $user->is_deleted = 1;
        $user->save();
        if($user){
            return response()->json($user->is_deleted, 200);
        }else{
            return response()->json("Error", 400);
        }
    }
}
