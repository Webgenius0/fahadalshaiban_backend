<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('client.layouts.dashboard');
    }
}
