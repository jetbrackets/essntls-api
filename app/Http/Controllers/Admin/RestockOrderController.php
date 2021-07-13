<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestockOrder;
use Illuminate\Http\Request;

class RestockOrderController extends Controller
{
    public function index()
    {
        $orders = RestockOrder::with(['items', 'items.product', 'driver', 'paymentMethod'])
                        ->orderBy('id', 'desc')
                        ->get();

        return response()->json($orders);
    }

    public function accept($id)
    {
        $order = RestockOrder::find($id);

        $order->status = RestockOrder::orderAccepted;
        $order->save();

        return response()->json(['order'=>$order, 'message' => 'Order accepted successfully']);
    }

    public function cancel($id)
    {
        $order = RestockOrder::find($id);

        $order->status = RestockOrder::orderCanceled;
        $order->save();

        return response()->json(['order'=>$order, 'message' => 'Order canceled successfully']);

    }


    public function shipping($id)
    {
        $order = RestockOrder::find($id);

        $order->status = RestockOrder::orderShipping;
        $order->save();

        return response()->json(['order'=>$order, 'message' => 'Order shipping successfully']);

    }

    public function completed($id)
    {
        $order = RestockOrder::find($id);

        $order->status = RestockOrder::orderDone;
        $order->save();

        return response()->json(['order'=>$order, 'message' => 'Order completed successfully']);

    }
}
