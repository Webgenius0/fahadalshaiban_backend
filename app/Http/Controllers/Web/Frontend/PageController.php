<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Http\Controllers\Controller;
use App\Models\CMS;

class PageController extends Controller
{
    public function termsAndConditions()
    {
        //cms start
        $query = CMS::where('page', PageEnum::HOME)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        return view('frontend.layouts.terms-and-conditions', compact('cms'));
    }
    public function privacyPolicy()
    {
        //cms start
        $query = CMS::where('page', PageEnum::HOME)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        return view('frontend.layouts.privacy-policy', compact('cms'));
    }
    public function refundPolicy()
    {
        //cms start
        $query = CMS::where('page', PageEnum::HOME)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        return view('frontend.layouts.refund-policy', compact('cms'));
    }
    public function cookiePolicy()
    {
        //cms start
        $query = CMS::where('page', PageEnum::HOME)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        return view('frontend.layouts.cookie-policy', compact('cms'));
    }
    public function proTips()
    {
        //cms start
        $query = CMS::where('page', PageEnum::HOME)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        return view('frontend.layouts.pro-tips', compact('cms'));
    }
    public function joinAsSignageOwner()
    {
        //cms start
        $query = CMS::where('page', PageEnum::HOME)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        return view('frontend.layouts.join-as-signage-owner', compact('cms'));
    }
}
