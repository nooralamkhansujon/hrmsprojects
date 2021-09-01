<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password'=> 'required|string|min:6'
        ]);

        ///log in the if credential is correct
        $user             = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['error'=>"Email or Password is not valid"],422);
        }
        //update user last login and then save
        $user->last_login = now();
        $user->save();
        $token = $user->createToken("Hrms managements")->plainTextToken;
        return response()->json(compact('token'));

    }


}
