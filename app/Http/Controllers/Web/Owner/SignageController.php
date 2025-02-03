<?php
namespace App\Http\Controllers\Web\Owner;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Signage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\alert;

class SignageController extends Controller
{
    public function index()
    {
       
    }

    public function create()
    {
        //
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'avg_daily_views' => 'required|integer|min:0',
            'per_day_price' => 'required|numeric|min:0',
            'display_size' => 'required|string',
            'exposure_time' => 'required|string',
            'on_going_ad' => 'required|integer|min:0',
            'space_left_for_ad' => 'required|integer|min:0',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'terms_and_conditions' => 'required|in:on,off',
            'privacy_policy' => 'required|in:on,off',
        ]);

        $validatedData['user_id'] = auth('web')->id();

        if ($request->hasFile('image')) {
            $validatedData['image'] = Helper::fileUpload($request->file('image'), 'signage', time() . '_' . getFileName($request->file('image')));
        }
        $validatedData['slug'] = Helper::makeSlug(Signage::class, $validatedData['name']);

        try {
            Signage::create($validatedData);
            return redirect()->route('admin.signage.index')->with('t-success', 'Created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
    

    public function showDetails($id)
    {
        
        $billboard= Signage::findOrFail($id);  
        //Log::info('Signage Data:', $billboard->toArray());
        return response()->json([
            'data'=>$billboard

        ]);
    }


    //edit 
    public function editSignage($id)
    {
        $signage = Signage::findOrFail($id);
    
        return view('owner.layouts.edit-signaage', compact('signage'));
    }


    //update 
    public function update(Request $request, $id)
    {
    
        $signage = Signage::findOrFail($id);
    
       
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'avg_daily_views' => 'required|integer',
            'per_day_price' => 'required|numeric',
            'display_size' => 'required|string',
            'exposure_time' => 'required|string',
            'on_going_ad' => 'required|integer',
            'space_left_for_ad' => 'required|integer',
            'location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
        ]);
    
        
        if ($request->hasFile('image')) {
            
            if ($signage->image && file_exists(public_path('images/signages/' . $signage->image))) {
                unlink(public_path('images/signages/' . $signage->image));
            }
 
            $image = $request->file('image');
            $validatedData['image'] = Helper::fileUpload($image, 'signage', time() . '_' . getFileName($image));
        }
 
        $validatedData['slug'] = Helper::makeSlug(Signage::class, $validatedData['name']);
 
        $signage->fill($validatedData);  
    
       
        $signage->save();
  
        session()->flash('success', 'Sign updated successfully!');

       return redirect()->back();
    }
    
    
    
}