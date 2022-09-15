<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "error" => "Invalid credentials"
            ], 400);
        }
        $token = $user->createToken($user->email)->plainTextToken;
        return response()->json([
            "user" => $user,
            "token" => $token
        ]);
    }
    public function register(Request $req)
    {
        $user = User::where("email", $req->email)->first();
        if ($user) {
            return response()->json([
                "error" => "User with given email already exists"
            ], 400);
        }
        try {
            $user = User::create([
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
            ]);
            $token = $user->createToken($user->email)->plainTextToken;
            return response()->json([
                "user" => $user,
                "token" => $token
            ]);
        } catch (Exception $ex) {
            return response()->json([
                "error" => "App error"
            ], 500);
        }
    }
    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
