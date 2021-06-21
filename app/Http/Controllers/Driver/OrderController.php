<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $order = Order::create([
            'driver_id' => NULL,
            'customer_id' => $user->id,
            'departure_address' => NULL,
            'delivery_address' => $request->delivery_address,
            'status' => Order::orderPending
        ]);

        $amount = 0;
        $items = 0;
        $shipping = 0;
        $commission = 0;

        foreach ($request->products as $item) {
            $product = Product::find($item['product_id']);

            $item = OrderItem::create([
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'value' => $item['qty'] * $product->price,
                'order_id' => $order->id,
            ]);

            $amount = $amount + $item->value;
            $items = $items + $item->value * 0.05;
            $shipping = $shipping + $item->value * 0.02;
            $commission = $commission + $item->value * 0.10;
        }

        $order->amount = $amount;
        $order->items = $items;
        $order->shipping = $shipping;
        $order->commission = $commission;
        $order->profit = $amount - $commission - $shipping - $items;

        $order->save();

        return response()->json(['message' => 'Order created successfully!', 'order' => $order]);
    }

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

        return response()->json(['message' => 'Order canceled successfully!','orders' => $order]);
    }
}
