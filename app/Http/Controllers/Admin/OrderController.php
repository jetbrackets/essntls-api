<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items', 'driver', 'customer'])
                        ->orderBy('id', 'desc')
                        ->paginate(4);

        return response()->json($orders);
    }
}
