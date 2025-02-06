<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        $orderData = $request->input('orderData');
        
        // Create a new order instance
        $order = new Order();
        $order->subtotal = $orderData['subtotal'];
        $order->despatch_fee = $orderData['despatchFee'];
        $order->total = $orderData['total'];
        $order->status = 'pending';  // Default status
        $order->save();  // Save the order to the database
    
        // Now, create the order items
        foreach ($orderData['items'] as $item) {
            $order->items()->create([
                'signage_id' => $item['signage_id'],
                'name' => $item['name'],
                'location' => $item['location'],
                'category_name' => $item['category_name'],
                'price_per_day' => $item['price_per_day'],
                'rotation_time' => $item['rotation_time'],
                'avg_daily_views' => $item['avg_daily_views']
            ]);
        }
    
        // Return a success response
        return response()->json(['message' => 'Order placed successfully!', 'order' => $order]);
    }
    
}
