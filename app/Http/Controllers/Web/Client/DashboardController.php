<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Signage;

class DashboardController extends Controller
{
    public function index()
    {
       
        return view('client.layouts.dashboard');
    }
}
