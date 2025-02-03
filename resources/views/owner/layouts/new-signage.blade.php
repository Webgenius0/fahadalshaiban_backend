@extends('owner.app', ['title' => 'Home'])
@section('content')
<div class="main-content">
    <div class="campaign-header">
        <div>
            <h4 class="campaign-header-title">Add New Signage</h4>
            <p class="campaign-subtitle">
                Follow this Steps to Add New Signage
            </p>
        </div>
    </div>

    <div class="describe-campaign mt-4">
        <h5>Describe your campaign bellow</h5>
        <form action="{{ route('owner.signage.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="describe-campaign-input-wrapper">
                <label>Signage Name <span>*</span></label>
                <input name="name" type="text" placeholder="Get 70% OFF Discount from Shashh" />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="describe-campaign-input-wrapper">
                <label>Description <span>*</span></label>
                <textarea name="description"></textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Average Daily Views<span>*</span></label>
                    <input name="avg_daily_views" type="number" placeholder="50k" min="0" />
                    @error('avg_daily_views')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Set Per Day Price<span>*</span></label>
                    <input name="per_day_price" type="number" placeholder="SR 5" min="0" />
                    @error('per_day_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
                <div class="describe-campaign-input-wrapper w-100">
                    <label>ADisplay size<span>*</span></label>
                    <input name="display_size" type="text" placeholder="638px x 176px" />
                    @error('display_size')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Set Exposure time per minute<span>*</span></label>
                    <input name="exposure_time" type="text" placeholder="0:08" />
                    @error('exposure_time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
                <div class="describe-campaign-input-wrapper w-100">
                    <label>On Going Ad<span>*</span></label>
                    <input name="on_going_ad" type="number" placeholder="10" min="0" />
                    @error('on_going_ad')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Space Left for Ad<span>*</span></label>
                    <input name="space_left_for_ad" type="number" placeholder="5" min="0" />
                    @error('space_left_for_ad')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="describe-campaign-input-wrapper w-100">
                <label>Signage Location<span>*</span></label>
                <input name="location" type="text" placeholder="Dammam" />
                @error('location')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="describe-campaign-input-wrapper w-100">
                <label>Upload Signage Photo</label>

                <div class="upload-box">
                    <input name="image" type="file" id="file-input" name="image" />
                    <div class="upload-content">
                        <span class="upload-icon">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19 15V17C19 18.1046 18.1046 19 17 19H7C5.89543 19 5 18.1046 5 17V15M12 15L12 5M12 5L14 7M12 5L10 7" stroke="#344051" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="upload-file-text">Upload file</span>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-4 flex-wrap">
                <label class="custom-checkbox-label">
                    <input type="checkbox" name="terms_and_conditions" id="terms-and-condition" required checked />
                    <span class="custom-checkbox-checkmark"></span>
                    <a href="{{ route('terms.conditions') }}" class="agree">Terms & Conditions</a>
                </label>
                @error('terms_and_condition')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <label class="custom-checkbox-label">
                    <input type="checkbox" name="privacy_policy" id="privacy-policy" required checked />
                    <span class="custom-checkbox-checkmark"></span>
                    <a href="{{ route('privacy.policy') }}" class="agree">Privacy Policy</a>
                </label>
                @error('privacy_policy')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-common w-100 mt-4">Submit For Approval</button>
        </form>
    </div>
</div>
@endsection
