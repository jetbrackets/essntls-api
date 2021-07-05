<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderLog;
use App\Models\Product;
use App\Models\Review;
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

        OrderLog::create([
            'action' => 'Order Created',
            'order_id' => $order->id,
            'driver_id' => NULL,
            'customer_id' => $user->id
        ]);

        return response()->json(['message' => 'Order created successfully!', 'order' => $order]);
    }

    public function myOrders()
    {
        $user = Auth::user();
        $orders = $user->customerOrders;

        return response()->json(['orders' => $orders]);
    }

    public function cancel($id)
    {
        $order = Order::whereId($id)->where('customer_id', Auth::id())->first();

        if(!$order) {
            return response()->json(['message' => 'Order not found!','orders' => $order]);
        }

        if(in_array($order->status, [Order::orderCanceled, Order::orderDone])) {
            return response()->json(['message' => 'This order cannot be canceled as it has already been completed!','orders' => $order]);
        }

        $order->status = Order::orderCanceled;
        $order->save();

        OrderLog::create([
            'action' => 'Order Canceled By Customer',
            'order_id' => $order->id,
            'driver_id' => $order->driver_id,
            'customer_id' => $order->user->id
        ]);

        return response()->json(['message' => 'Order canceled successfully!','orders' => $order]);
    }

    public function createReview(Request $request, $id)
    {
        $review = Review::create([
            'description' => $request->description,
            'order_id' => $id,
            'driver_id' => $request->driver_id,
            'customer_id' => Auth::user()->id,
        ]);

        return response()->json(['message' => 'Review created successfully!','review' => $review]);

    }
}
