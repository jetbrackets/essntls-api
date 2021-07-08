<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function logout()
    {
        $user = Auth::user();

        $user->tokens()->delete();
    }

    public function registerDriver(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $request->type,
            'status' => User::statusPendding,
            'is_active' => true,
            'image' => NULL,
            'phone' => $request->phone
        ]);

        Address::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
        ]);

        return response()->json(['message' => 'User created successfully!', 'user' => $user]);
    }
}
