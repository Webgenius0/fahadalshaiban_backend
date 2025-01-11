<?php

namespace App\Http\Controllers\Web\Backend\CMS\Home;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class WhyChooseController extends Controller
{

    public function index()
    {
        $why_choose = CMS::where('page', Page::HOME->value)->where('section', Section::WHY_CHOOSE->value)->first();
        return view('backend.layouts.cms.home.why-choose', compact('why_choose'));
    }
    public function update(Request $request)
    {
        $validatedData = request()->validate([
            'title'         => 'required|string|max:50',
            'description'   => 'required|string|max:255',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'button_text'   => 'required|string|max:20',
            'link_url'   => 'required|string|max:100',
        ]);
        try {
            $validatedData['page'] = Page::HOME->value;
            $validatedData['section'] = Section::WHY_CHOOSE->value;
            if ($request->hasFile('image')) {
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'why_choose', time() . '_' . getFileName($request->file('image')));
            }
            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }
            return redirect()->route('cms.home.why-choose')->with('success', 'Updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
