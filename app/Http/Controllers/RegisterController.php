<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $credentials = $request->only('email', 'password');

        $token = auth()->attempt($credentials);

        return new UserResource($user);
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error' => 'invalid_crudential'], 401);
        };

        return (new UserResource($request->user()))
                ->additional(['meta' => [
                    'token' => $token,
                ]]);
    }
}
