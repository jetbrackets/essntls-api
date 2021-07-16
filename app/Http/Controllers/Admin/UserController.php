<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
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
     * Get All Admins
     *
     */


    public function getAdmins()
    {
        $admins = User::whereType('admin')->get();

        return response()->json($admins);
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

    public function getDriverReview($driverId)
    {
        $query = Review::where('driver_id', $driverId);
        $reviews = $query->get();
        $deliveries = Order::where('status', 'done')->where('driver_id', $driverId)->count();

        $rating = $query->whereNotNull('note')->count();
        $review = $query->whereNotNull('description')->count();


        $fiveStars = $query->where('note', 5)->count();
        $fourStars = $query->where('note', 4)->count();
        $threeStars = $query->where('note', 3)->count();
        $twoStars = $query->where('note', 2)->count();
        $oneStars = $query->where('note', 1)->count();


        $total = $query->count();
        $deliveriesP = $total - ($total / 100 * $deliveries);
        $ratingP = $total - ($total / 100 * $rating);
        $reviewP = $total - ($total / 100 * $review);


        return response()->json([
                                'reviews' => $reviews,
                                'deliveries' => $deliveries,
                                'rating' => $rating,
                                'review' => $review,
                                'deliveriesP' => $deliveriesP,
                                'ratingP' => $ratingP,
                                'reviewP' => $reviewP,
                                'fiveStars' => $fiveStars,
                                'fourStars' => $fourStars,
                                'threeStars' => $threeStars,
                                'twoStars' => $twoStars,
                                'oneStars' => $oneStars,
                            ]);
    }

    public function editAdmin($id)
    {

        $admin = User::whereType('admin')->findOrFail($id);

        return response()->json(['admin' => $admin]);
    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id.',id',
            'phone' => 'required|unique:users,phone,'.$id.',id',
            'password' => 'required',
            'name' => 'required',
        ]);

        $admin = User::whereType('admin')->findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone
        ]);

        return response()->json(['message' => 'Admin updated successfully!', 'admin' => $admin]);
    }

    public function deleteAdmin($id)
    {

        $admin = User::whereType('admin')->findOrFail($id);
        $admin->delete();

        return response()->json(['message' => 'Admin deleted successfully!']);
    }
}
