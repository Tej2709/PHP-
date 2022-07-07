<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;





use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    //



    public function index(Request $request)
    {
        $data=User::latest()->get();
        return view('index',compact('data'));
    }

    public function register(Request $request)
    {
     $validator =  Validator::make($request->all(),[

        'name' => 'Required|string|min:2|max:20',
        'email' => 'required|string|email|max:20|unique:users',
        'password' => 'required|string|min:5|max:20|confirmed',

       ]);

       if($validator->fails())
       {
         return response()->json([$validator->errors(),400]);
       }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return response()->json([
            'message'=>"User registered successfully",
            'user'=>$user,
        ]);
    }


    public function login(Request $request)
    {
        $validator =  Validator::make($request->all(),[

            
            'email' => 'required|string|email',
            'password' => 'required|string|min:5|max:20',
    
           ]);
    
           if($validator->fails())
           {
             return response()->json([$validator->errors(),400]);
           }

           if(!$token = auth()->attempt($validator->validated()))
           {
                return response()->json(['error'=>'Unauthorized']);
           }

           return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([

            'access_token' => $token,
            'token_type' => 'bearer',
            
        ]);
    }


    public function profile ()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        auth()->logout();
        
        return response()->json(['message'=>'User Successfully logged out']);
    }
}
