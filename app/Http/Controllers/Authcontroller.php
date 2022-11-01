<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class Authcontroller extends Controller
{
    public function me(){
        return [
            'Nis' => 3103120166,
            'Name' => 'Nizar Ali Rifai',
            'Phone' => '0896 7876 5674',
            'Class' => 'XII RPL 5'
        ];
    }

    public function register(Request $request){
        
        $field = $request -> validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password'])
        ]);

        $token = $user->CreateToken('tokenku')->plainTextToken;

        $response =[
            'user'=>$user,
            'token'=>$token
        ];

        return response($response, 201);
    }
   
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

    //check email
    $user = User::where('email', $fields['email'])->first();

    //Check password
    if (!$user || !Hash::check($fields['password'], $user->password)) {
        return response([
            'message' => 'unauthorized'
        ], 401);
    }

    $token = $user->createToken('tokenku')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
}

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}