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
        $creds = $request->only(['username','password']);

        if(!$token=auth()->attempt($creds)){
            return response()->json([
                'success'=>false,
                'message' => 'invalid credintials'
            ]);
        }
        return response()->json([
            'success'=>true,
            'token'=>$token,
            'user'=>Auth::user()
        ]);
    }
    public function register1(Request $request){
        $encyptedPass = Hash::make($request->password);

        $user = new User;

        try{
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $encyptedPass;
            $user->save();
            return $this->login($request);
        }
        catch(Exception $e){
            return response()->json([
                'success'=>false,
                'message'=> ''.$e
            ]); 
        }
    }

    public function register2(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phonenumber = $request->phonenumber;
        $user->update();
        
        return response()->json([
            'success'=> true,
            'user'=>$user
        ]);
       
    }

        
    

    public function logout(Request $request){// need token 
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success'  => true, 
                'message' => 'logout succes'
            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }
}
