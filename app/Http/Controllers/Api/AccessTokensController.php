<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccessTokensController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'device_name' => 'String|max:255',
        ]);

        $user = User::where('email', '=', $request->eamil)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $device_name = $request->post('device_name', $request->userAgent());
            $token = $user->createToken($device_name);
            return response()->josn([
                'code' => 100,
                'token' => $token->plainTextToken,
                'user' => $user,
            ], 201); //Response::HTTP_CRAETED
        }
        return response()->json([
            'code' => 0,
            'message' => 'Invalid Credentials',
        ], 401); //Response::HTTP_UNAUTHORIZED
    }
}
