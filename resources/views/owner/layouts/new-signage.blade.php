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
        <form>
            <div class="describe-campaign-input-wrapper">
                <label>Signage Name <span>*</span></label>
                <input
                    type="text"
                    placeholder="Get 70% OFF Discount from Shashh" />
            </div>

            <div class="describe-campaign-input-wrapper">
                <label>Description <span>*</span></label>
                <textarea></textarea>
            </div>

            <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Average Daily Views<span>*</span></label>
                    <input type="text" placeholder="50k" />
                </div>
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Set Per Day Price<span>*</span></label>
                    <input type="text" placeholder="SR 5" />
                </div>
            </div>

            <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
                <div class="describe-campaign-input-wrapper w-100">
                    <label>ADisplay size<span>*</span></label>
                    <input type="text" placeholder="638px x 176px" />
                </div>
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Set Exposure time per minute<span>*</span></label>
                    <input type="text" placeholder="8 Seconds" />
                </div>
            </div>

            <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
                <div class="describe-campaign-input-wrapper w-100">
                    <label>On Going Ad<span>*</span></label>
                    <input type="text" placeholder="10" />
                </div>
                <div class="describe-campaign-input-wrapper w-100">
                    <label>Space Left for Ad<span>*</span></label>
                    <input type="text" placeholder="5" />
                </div>
            </div>

            <div class="describe-campaign-input-wrapper w-100">
                <label>Signage Location<span>*</span></label>
                <input type="text" placeholder="Dammam" />
            </div>

            <div class="describe-campaign-input-wrapper w-100">
                <label>Upload Signage Photo</label>

                <div class="upload-box">
                    <input type="file" id="file-input" />
                    <div class="upload-content">
                        <span class="upload-icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M19 15V17C19 18.1046 18.1046 19 17 19H7C5.89543 19 5 18.1046 5 17V15M12 15L12 5M12 5L14 7M12 5L10 7"
                                    stroke="#344051"
                                    stroke-width="1.67"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="upload-file-text">Upload file</span>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-4 flex-wrap">
                <label class="custom-checkbox-label">
                    <input
                        type="checkbox"
                        name="terms-and-condition"
                        id="terms-and-condition" />
                    <span class="custom-checkbox-checkmark"></span>
                    <a href="./terms-and-conditions.html" class="agree">Terms & Conditions</a>
                </label>

                <label class="custom-checkbox-label">
                    <input
                        type="checkbox"
                        name="privacy-policy"
                        id="privacy-policy" />
                    <span class="custom-checkbox-checkmark"></span>
                    <a href="./privacy-policy.html" class="agree">Privacy Policy</a>

                </label>
            </div>

            <button type="submit" class="btn-common w-100 mt-4">
                Submit For Approval
            </button>
        </form>
    </div>
</div>
@endsection
