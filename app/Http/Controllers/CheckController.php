<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|string',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::create([
            'name' => $request->name,
            'age' => $request->email,
           
        ]);
    
        return response()->json(['message' => 'User registered successfully', 'user' => $user]);
    }
}
