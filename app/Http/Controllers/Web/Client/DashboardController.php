<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Signage;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
       
        $orders = Order::where('user_id', auth('web')->user()->id)->get();
        return view('client.layouts.dashboard', compact('orders'));
    }
}
