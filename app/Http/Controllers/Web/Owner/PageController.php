<?php

namespace App\Http\Controllers\Web\Owner;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function tutorials()
    {
        return view('owner.layouts.tutorial');
    }
    public function signage()
    {
        return view('owner.layouts.new-signage');
    }
    public function incomeStatement()
    {
        return view('owner.layouts.income-statement');
    }

    public function profile()
    {
        return view('owner.layouts.profile');
    }
}