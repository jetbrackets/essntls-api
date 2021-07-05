<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Get All Drivers (Services Providers)
     *
     */

    public function getDrivers()
    {
        $drivers = User::whereType('driver')->with(['address', 'paymentMethod', 'driverOrders', 'iventoryItems', 'reviews'])->get();

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

    public function store(Request $request)
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
