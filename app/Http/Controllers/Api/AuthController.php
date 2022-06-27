<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request) {
        $registrationData = $request->all();
        $validate = Validator::make($registrationData, [
            'email'=>'required|email:rfc,dns|unique:users',
        ]);

        if($validate->fails())
            return response(['message'=>$validate->errors()], 400); 

        $registrationData['password'] = bcrypt($request->tanggal_lahir); 
        
        $user = User::create($registrationData);
  
        return response([
            'message' => 'Register Success',
            'customer' => $user,
        ], 200);
    }

    public function login(Request $request){
        $loginData = $request->all();
        $validate = Validator::make($loginData, [
            'email'=>'required|email:rfc,dns',
            'password'=>'required'
        ]);

        if($validate->fails())
            return response(['message'=>$validate->errors()], 400);

        if(!Auth::attempt($loginData))
            return response(['message'=>'Invalid Credentials'], 401);

        $user = Auth::user();

        $token = $user->createToken('Authenticaton Token')->accessToken;

        return response([
            $customers = DB::table('users')
                    ->where('email', $request['email'])
                    ->update(['remember_token'=>bcrypt($token)]),
            'message'=>'Authenticated',
            'customer' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }


    public function login_api(Request $request){
        $loginData = $request->all();
        $validate = Validator::make($loginData,[
            'email'=>'required|email:rfc,dns',
            'password' => 'required',
        ]);
        if($validate->fails())
            return response(['message' => $validate->errors(),400]);

        if(!Auth::attempt($loginData))
            return response(['message'=>'Invalid Credentials'], 401);

        return response([
            $user = DB::table('users')
                    ->where('email', $request['email'])
                    ->update(['remember_token'=>bcrypt($token)]),
            'message'=>'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }
}
