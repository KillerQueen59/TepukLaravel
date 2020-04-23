<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\User;
use JWTAuth;

//auth class
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    
    public function login(Request $request){
        $creds = $request->only(['email','password']);

        if(!$token=auth()->attempt($creds)){
            return response()->json([
                'succes'=>false,
                'message' => 'invalid credintials'
            ]);
        }
        return response()->json([
            'succes'=>true,
            'token'=>$token,
            'user'=>Auth::user()
        ]);
    }
    public function register(Request $request){
        $encyptedPass = Hash::make($request->password);

        $user = new User;

        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $encyptedPass;
            $user->save();
            return $this->login($request);
        }
        catch(Exception $e){
            return response()->json([
                'succes'=>false,
                'message'=> ''.$e
            ]); 
        }
    }
    public function logout(Request $request){// need token 
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'succes'  => true, 
                'message' => 'logout succes'
            ]);
        }catch(Exception $e){
            return response()->json([
                'succes' => false,
                'message' => ''.$e
            ]);
        }
    }
}
