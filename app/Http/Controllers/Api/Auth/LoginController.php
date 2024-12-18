<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!Auth::attempt($request->only(['email', 'password']))) {
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered are incorrect']
            ]);
        }
        
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('laravel_api_token')->plainTextToken
        ]);
        
    }
}
