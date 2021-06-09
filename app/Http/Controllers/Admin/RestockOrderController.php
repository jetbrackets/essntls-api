<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestockOrder;
use Illuminate\Http\Request;

class RestockOrderController extends Controller
{
    public function index()
    {
        $orders = RestockOrder::with(['items', 'driver'])
                        ->orderBy('id', 'desc')
                        ->get();

        return response()->json($orders);
    }
}
