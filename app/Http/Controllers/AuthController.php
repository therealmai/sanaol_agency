<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Talent;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'insta_handle' => 'max:255',
            'user_type' => 'in:general,admin,talent'
        ]);

        if ($request->user_type == 'general') {
            $user = new User;
            $user->user_type = 'general';
        } else if ($request->user_type == 'talent') {
            $user = new Talent;
            $user->user_type = 'talent';
        } else {
            return response()->json(['msg' => 'invalid request'], 400);
        }

        $user->fill($request->except(['password']));
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user->only(['id', 'fname', 'lname', 'email', 'insta_handle', 'user_type']),
            'access_token' => $token,
            'token_type' => 'Bearer',
            'msg' => 'Successfully registered user'
        ],200);
    }

    /**
     * Logout user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response('Logged out', 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return response(['msg' => 'Email does not exist'], 400);
        }
        if(!Hash::check($request->password, $user->password)) {
            return response(['msg' => 'Incorrect password'], 400);
        }

        if($user->user_type == 'talent') {
            $data = Talent::find($user->id);
        }
        else if($user->user_type == 'admin') {
            $data = Admin::find($user->id);
        } else {
            $data = $user;
        }

        $token = $data->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user->only(['id', 'fname', 'lname', 'email', 'insta_handle', 'user_type']),
            'access_token' => $token,
            'token_type' => 'Bearer',
            'msg' => 'Successfully registered user'
        ],200);
    }
}
