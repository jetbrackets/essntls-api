<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderLog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function myOrders()
    {
        $user = Auth::user();
        $orders = $user->driveOrders;

        return response()->json(['orders' => $orders]);
    }

    public function pending()
    {
        $orders = Order::where('status', Order::orderPending)->get();
        return response()->json(['orders' => $orders]);
    }

    public function accept(Request $request, $id)
    {
        $order = Order::whereId($id)->where('status', Order::orderPending)->first();

        if(!$order) {
            return response()->json(['message' => 'Order not found!']);
        }

        if($order->status != Order::orderPending) {
            return response()->json(['message' => 'Sorry this order is no longer available!']);
        }

        $order->status = Order::orderAccepted;
        $order->driver_id = Auth::id();
        $order->departure_address = $request->address;
        $order->save();

        OrderLog::create([
            'action' => 'Order Accepted',
            'order_id' => $order->id,
            'driver_id' => $order->driver_id,
            'customer_id' => $order->customer_id
        ]);

        return response()->json(['message' => 'Order accepted successfully!','orders' => $order]);
    }


    public function cancel($id)
    {
        $order = Order::whereId($id)->where('driver_id', Auth::id())->first();

        if(!$order) {
            return response()->json(['message' => 'Order not found!','orders' => $order]);
        }

        if(in_array($order->status, [Order::orderCanceled, Order::orderDone])) {
            return response()->json(['message' => 'This order cannot be canceled as it has already been completed!','orders' => $order]);
        }

        $order->status = Order::orderCanceled;
        $order->save();

        OrderLog::create([
            'action' => 'Order Canceled By Driver',
            'order_id' => $order->id,
            'driver_id' => $order->driver_id,
            'customer_id' => $order->customer_id
        ]);

        return response()->json(['message' => 'Order canceled successfully!','orders' => $order]);
    }
}
