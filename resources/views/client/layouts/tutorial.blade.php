@extends('client.app', ['title' => 'Tutorials'])
@section('content')
<div class="main-content">
    <div class="campaign-header">
        <div>
            <h4 class="campaign-header-title">Tutorials</h4>
        </div>
    </div>

    <div class="tutorial-container">
        <div class="w-100">
            <h2 class="campaign-header-title">See how it works</h2>
            <div class="video-container">
                <img src="{{ asset('frontend') }}/images/works-thumbnail.png" alt="Video Thumbnail" class="video-thumbnail" id="videoThumbnail" />
                <div class="play-button" id="playButton">
                    <div class="circle pulse"></div>
                    <div class="circle"></div>
                    <span class="play-icon">&#9654;</span>
                </div>
            </div>
        </div>
        <div class="w-100">
            <h2 class="campaign-header-title">See how it works</h2>
            <div class="video-container">
                <img
                    src="{{ asset('frontend') }}/images/works-thumbnail.png"
                    alt="Video Thumbnail"
                    class="video-thumbnail"
                    id="videoThumbnail" />
                <div class="play-button" id="playButton">
                    <div class="circle pulse"></div>
                    <div class="circle"></div>
                    <span class="play-icon">&#9654;</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
