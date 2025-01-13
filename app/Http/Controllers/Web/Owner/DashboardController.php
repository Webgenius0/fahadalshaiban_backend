<?php

namespace App\Http\Controllers\Web\Owner;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('owner.layouts.dashboard');
    }
}
