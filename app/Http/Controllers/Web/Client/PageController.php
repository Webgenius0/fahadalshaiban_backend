<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function tutorials()
    {
        return view('client.layouts.tutorial');
    }

    public function profile()
    {
        return view('client.layouts.profile');
    }

    public function invoiceList(){
        return view('client.layouts.invoice-list');
    }

    public function invoice(){
        return view('client.layouts.invoice');
    }

    public function newCampaigns(){
        return view('client.layouts.new-campaigns');
    }

    public function billing(){
        return view('client.layouts.billing');
    }
    
    public function cart(){
        return view('client.layouts.cart');
    }

    public function startedForm(){
        return view('client.layouts.get-started-form');
    }
}