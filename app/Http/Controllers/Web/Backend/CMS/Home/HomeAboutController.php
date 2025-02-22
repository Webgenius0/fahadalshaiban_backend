<?php

namespace App\Http\Controllers\Web\Backend\CMS\Home;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{

    public function index()
    {
        $about = CMS::where('page', PageEnum::HOME->value)->where('section', SectionEnum::HOME_ABOUT->value)->first();
        return view('backend.layouts.cms.home.about', compact('about'));
    }
    public function update(Request $request)
    {
        $validatedData = request()->validate([
            'title'         => 'required|string|max:50',
            'description'   => 'required|string|max:255',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        
        try {
            $validatedData['page'] = PageEnum::HOME->value;
            $validatedData['section'] = SectionEnum::HOME_ABOUT->value;
            if ($request->hasFile('image')) {
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
            }

            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }

            return redirect()->route('admin.cms.home.about.index')->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
