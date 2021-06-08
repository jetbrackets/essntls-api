<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->whereType('admin')->first();

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

    public function getDrivers()
    {
        $drivers = User::whereType('driver')->with(['address', 'paymentMethod'])->get();

        return response()->json($drivers);
    }

    public function getCustomers()
    {
        $customers = User::whereType('customer')->with(['address', 'paymentMethod'])->get();

        return response()->json($customers);
    }
}
