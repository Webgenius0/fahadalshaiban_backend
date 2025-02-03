@extends('owner.app', ['title' => 'Home'])
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
    <h5>Describe your campaign below</h5>
    <form action="{{route('owner.signage.update', $signage->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- The action route might be different if you're editing an existing signage -->
        <div class="describe-campaign-input-wrapper">
            <label>Signage Name <span>*</span></label>
            <input name="name" type="text" placeholder="Get 70% OFF Discount from Shashh" value="{{ old('name', $signage->name) }}" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="describe-campaign-input-wrapper">
            <label>Description <span>*</span></label>
            <textarea name="description">{{ old('description', $signage->description) }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
            <div class="describe-campaign-input-wrapper w-100">
                <label>Average Daily Views<span>*</span></label>
                <input name="avg_daily_views" type="number" placeholder="50k" min="0" value="{{ old('avg_daily_views', $signage->avg_daily_views) }}" />
                @error('avg_daily_views')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="describe-campaign-input-wrapper w-100">
                <label>Set Per Day Price<span>*</span></label>
                <input name="per_day_price" type="number" placeholder="SR 5" min="0" value="{{ old('per_day_price', $signage->per_day_price) }}" />
                @error('per_day_price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
            <div class="describe-campaign-input-wrapper w-100">
                <label>Display size<span>*</span></label>
                <input name="display_size" type="text" placeholder="638px x 176px" value="{{ old('display_size', $signage->display_size) }}" />
                @error('display_size')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="describe-campaign-input-wrapper w-100">
                <label>Set Exposure time per minute<span>*</span></label>
                <input name="exposure_time" type="text" placeholder="0:08" value="{{ old('exposure_time', $signage->exposure_time) }}" />
                @error('exposure_time')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="d-flex align-items-start flex-wrap column-gap-4 w-100">
            <div class="describe-campaign-input-wrapper w-100">
                <label>On Going Ad<span>*</span></label>
                <input name="on_going_ad" type="number" placeholder="10" min="0" value="{{ old('on_going_ad', $signage->on_going_ad) }}" />
                @error('on_going_ad')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="describe-campaign-input-wrapper w-100">
                <label>Space Left for Ad<span>*</span></label>
                <input name="space_left_for_ad" type="number" placeholder="5" min="0" value="{{ old('space_left_for_ad', $signage->space_left_for_ad) }}" />
                @error('space_left_for_ad')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="describe-campaign-input-wrapper w-100">
            <label>Signage Location<span>*</span></label>
            <input name="location" type="text" placeholder="Dammam" value="{{ old('location', $signage->location) }}" />
            @error('location')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="describe-campaign-input-wrapper w-100">
            <label>Upload Signage Photo</label>
            <div class="upload-box">
                <input name="image" type="file" id="file-input" name="image" data-default-file="{{ asset($signage->image) }}" alt="billboard -image"/>
                <div class="upload-content">
                    <span class="upload-icon">
                        <!-- Your upload icon here -->
                    </span>
                    <span class="upload-file-text">Upload file</span>
                </div>
            </div>
        </div>

       
        <button type="submit" class="btn-common w-100 mt-4">Update</button>
    </form>
</div>

</div>


@endsection

@push('script')
<script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>
<script>
    
     $(document).ready(function() {
        const flasher = new Flasher({
            selector: '[data-flasher]',
            duration: 3000,
            options: {
                position: 'top-center',
            },
        });
    });
</script>
@endpush