<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusUpdated;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        // Broadcast the event
        broadcast(new OrderStatusUpdated($order));

        return response()->json(['message' => 'Order status updated.']);
    }
}
