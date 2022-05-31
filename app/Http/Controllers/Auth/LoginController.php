<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return new JsonResponse([
                'errors' => [
                    'email' => ['Invalid credentials'],
                ],
            ], 401);
        }

        $token = Auth::user()->createToken($request->device_name)->plainTextToken;

        return new JsonResponse([
            'data' => [
                'token' => $token,
            ],
        ]);
    }
}
