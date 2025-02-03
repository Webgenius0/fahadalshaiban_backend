<?php
namespace App\Http\Controllers\Web\Owner;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Signage;
use Illuminate\Support\Str;

class SignageController extends Controller
{
    public function index()
    {
       //
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
    
}