<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Signage;

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
        $signages= Signage::all();
        
        return view('client.layouts.new-campaigns', compact('signages'));
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

 // for detact location according to lat and lan
 public function getLocation($id)
 {
     try {
         $signage = Signage::find($id); 
         if (!$signage) {
             return response()->json(['error' => 'Signage not found'], 404);
         }
         return response()->json([
             'name' => $signage->name,  
            'signage_id' => $signage->id,
            'location' => $signage->location,
            'type' => $signage->type,
            'price_per_day' => $signage->per_day_price,
            'rotation_time' => $signage->rotation_time,
            'total_views' => $signage->total_views,
            'category_name' => $signage->category_name,
            'avg_daily_views'=>$signage->avg_daily_views
         ]);
     } catch (\Exception $e) {
         return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
     }
 }
 
}