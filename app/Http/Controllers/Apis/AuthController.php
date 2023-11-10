<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requestes\LoginUserRequest;
use App\Http\Requestes\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller{
    use HttpResponse;
    public function register(StoreUserRequest $request){
   
   // make sure data coming from request is validated
        $validated = $request->validated();
   
         $validated['password'] = Hash::make($validated['password']);
        
   // create validated data  in databas
        $user = User::create([
            'name' =>$validated['name'],
            'email' =>$validated['email'],
            'password' =>$validated['password'],    
            'phone' => $request->phone
        ]);
    
   
        $token = $user->createToken("APITokenFor_{$user->name}")->plainTextToken;
   
        return $this->Http_json_response(200,'User is successfuly',[
            'Token' => $token,
            'User' => $user
        ]);
   
   
    }

    public function Login(Request $request){

        //  make sure data coming from request is validated
        

        // Is user is authenticated or not

        if(! auth::attempt($request->only(['email','password']))){

            return $this->Http_json_response(401,'email or password is wrong');

         } else{

            // get the user
            $user = user::where('email','=',$request->email)->first();
        
            // create token to this user
            $Token = $user->createToken("APITokenFor_{$user->name}")->plainTextToken;

            //  response
            return $this ->http_json_response(200,'logging ib successfully',[
                'User' =>$user,
                'Token' => $Token
            ]);

            }
        
    
    }

    public function Logout(){

        Auth::user()->currentAccessToken()->delete();

        return $this->Http_json_response(200,'logging out successfully,see you soon');
    } 


}