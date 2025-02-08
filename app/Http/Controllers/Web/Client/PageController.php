<?php

namespace App\Http\Controllers\Web\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CampaignDetails;
use App\Models\Signage;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;

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
        $categories= Category::all();
        
        return view('client.layouts.new-campaigns', compact('signages', 'categories'));
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
 //store 

 public function checkout(Request $request)
 {
   
     // Validate incoming request
     $request->validate([
         'items' => 'required|array',
         'subtotal' => 'required|numeric',
         'dispatchFee' => 'required|numeric',
         'total' => 'required|numeric',
     ]);

     

     $shortUuid = $this->generateShortUuid(5);
     // Create the order
     $order = Order::create([
         'user_id' => auth()->id(),  
         'uuid' => $shortUuid,
         'subtotal' => $request->subtotal,
         'dispatch_fee' => $request->dispatchFee,
         'total' => $request->total,
         'status' => 'pending',
     ]);

     
    //  $campaign = CampaignDetails::create([
    //     'order_id' => $order->id,  // Associate with the created order
    //     'ad_title' => $request->ad_title,
    //     // 'campaign_description' => $request->campaign_description,
    //     // 'start_date' => $request->start_date,
    //     // 'end_date' => $request->end_date,
    //     // 'terms_and_conditions' => $request->terms_and_conditions,
    //     // 'privacy_policy' => $request->privacy_policy,
    // ]);

     // Add order items
     foreach ($request->items as $item) {
         OrderItem::create([
             'order_id' => $order->id,
             'signage_id' => $item['signage_id'],
             'price_per_day' => $item['price_per_day'],
             'rotation_time' => $item['rotation_time'],
             'avg_daily_views' => $item['avg_daily_views'],
             'total' => $item['total'],
         ]);
     }
    Log::info("Order placed successfully");
     // Return a success response
     return response()->json(['message' => 'Order placed successfully', 'order_id' => $order->id]);
 }


 private function generateShortUuid($length = 5)
 {
     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // Letters and Numbers
     $randomString = '';
     
     for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[random_int(0, strlen($characters) - 1)];
     }
     
     return $randomString;
 }
}



 //fieltring

//  public function filterSignages(Request $request)
//  {
//      // Get the city from the request
//      $city = $request->city;

//      // Query signages based on the city
//      $signages = Signage::where('location', $city)->get(); // Assuming 'location' is the city field in the database

//      // Return the filtered signages HTML (rendering the new view for filtered signages)
//      return response()->json([
//          'html' => view('new-campaigns', compact('signages'))->render() // Render the filtered signages
//      ]);
// }
