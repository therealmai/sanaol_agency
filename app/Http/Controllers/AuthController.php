<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'insta_handle' => 'max:255'
        ]);

        $user = new User;
        $user->fill($request->except(['password']));
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer'], 200);
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

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer'], 200);
    }
}
