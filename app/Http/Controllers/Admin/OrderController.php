<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items', 'items.product',  'driver', 'customer'])
                        ->orderBy('id', 'desc')
                        ->get();

        return response()->json($orders);
    }
}
