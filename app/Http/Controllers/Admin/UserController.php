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

    /**
     * Get All Drivers (Services Providers)
     *
     */

    public function getDrivers()
    {
        $drivers = User::whereType('driver')->with(['address', 'paymentMethod'])->get();

        return response()->json($drivers);
    }

    /**
     * Get All Customers
     *
     */


    public function getCustomers()
    {
        $customers = User::whereType('customer')->with(['address', 'paymentMethod'])->get();

        return response()->json($customers);
    }
    /**
     * Block user
     * @param Int $id
     */

    public function blockUser($id) {
        $user = User::findOrFail($id);
        $user->status = User::statusBlocked;
        $user->save();

        return response()->json(['message' => 'User blocked successfully!', 'user' => $user]);
    }

    /**
     * Approve user
     * @param Int $id
     */


    public function approveUser($id) {
        $user = User::findOrFail($id);
        $user->status = User::statusApproved;
        $user->save();

        return response()->json(['message' => 'User approved successfully!', 'user' => $user]);
    }
}
