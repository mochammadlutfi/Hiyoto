@extends('umum.layouts.master')
@section('title', $title)

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/components/portfolio-galleries.css') }}">
@endsection

@section('content')
<!-- Inner Banner -->
<section class="inner-banner">
    <div class="titlebar-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <h1 class="inner-page-title">Gallery Video</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->

<!-- Blog -->
<section class="section-md bg-white pt-md-70 pb-md-40 pt-sm-50 pb-sm-20 pt-xs-40 pb-xs-10">
    <div class="container">
        <div class="row">
            @forelse($video as $data)
            <div class="col-lg-4">
                <div class="video-box blog-style-2 mb-4 p-1">
                    <div class="video-thumbnail">
                        <img src="{{ $data->thumbnail_url }}" class="img-fluid" alt="{{ $data->judul }}">
                    </div>
                    <div class="video-content px-1 py-1">
                        <h4 class="video-box-title"><a href="{{ route('galeri.watch', $data->slug) }}">{{  $data->judul }}</a></h4>
                        <div class="video-date">
                            <i class="fa fa-calendar"></i>
                            {{ $data->dibuat }}
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-lg-6">
                    <img src="{{ asset('img/placeholder/data_not_found.png') }}" class="img-fluid">
                </div>
            @endforelse
        </div>
    </div>
</section>
@stop

@push('scripts')
@endpush
