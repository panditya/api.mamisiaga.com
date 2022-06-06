<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mother;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    private $token;

    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' => ['required', 'date'],
            'place_of_birth' => ['required', 'string'],
            'device_name' => ['required', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($request) {
            $mother = Mother::create([
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'place_of_birth' => $request->place_of_birth,
            ]);

            $user = $mother->user()->create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $this->token = $user->createToken($request->device_name)->plainTextToken;
        });

        return new JsonResponse([
            'data' => [
                'token' => $this->token,
            ],
        ]);
    }
}
