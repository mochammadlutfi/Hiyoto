@extends('umum.layouts.master')
@section('title', $title)
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/video.js@7.0.0/dist/video-js.min.css">
@endsection

@section('content')
<div class="page-content">

    <!-- Inner Banner -->
    <section class="inner-banner">
        <div class="titlebar-main">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="inner-page-title">Detail Video</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 blog-right-col">
                    <div class="row">
                        <!-- Blog 01 -->
                        <div class="col-md-12">
                            <div class="blog-box blog-style-1 blog-single-detail">
                                <video poster="{{ $video->thumbnail_url }}" id="vid1" class="video-js vjs-default-skin" controls width=100%
                                data-setup='{ "fluid": true, "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $video->url }}"}], "youtube": { "iv_load_policy": 1 } }'>
                                </video>
                                <h2 class="title py-2">{{ $video->judul }}</h2>
                                <div class="blog-content">
                                    <?= $video->deskripsi; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 blog-left-col mb-25 mb-xs-20 mt-md-50">
                    <div class="sidebar">

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@stop

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/video.js@7.0.0/dist/video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.6.1/Youtube.min.js"></script>
<script>
    jQuery(document).ready(function () {
        // var player = videojs('vid1', {
        //     height: "400px";
        //     fluid: true,
        //     autoplay: false,
        //     controls: true,
        // });
    });
</script>
@endpush
