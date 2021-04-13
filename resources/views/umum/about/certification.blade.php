@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/magnific-popup/magnific-popup.css') }}">
    
@endsection


@section('content')
<!-- Hero -->
{{-- <div class="bg-image" style="background-image: url('assets/media/photos/photo27@2x.jpg');"> --}}
    <div class="bg-body-light">
        <div class="content text-center">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 mb-10">{{ __('front_menu.about_us') }}</h1>
                <h2 class="h4 font-w400">{{ __('front_menu.certification') }}</h2>
            </div>
        </div>
    </div>
{{-- </div> --}}
<!-- END Hero -->

@php
    $data = collect([
            array(
                "nama" => "ISO 14001",
                "img" => asset('img/certification/ISO-14001-2015.jpg')
            ),
            array(
                "nama" => "ISO 9001",
                "img" => asset('img/certification/ISO-9001-2015.jpg')
            ),
            array(
                "nama" => __('about.certification.halal'),
                "img" => asset('img/certification/halal.jpg')
            ),
            array(
                "nama" => __('about.certification.policy_halal'),
                "img" => asset('img/certification/kebijakan_halal.jpg')
            ),
            array(
                "nama" => __('about.certification.quality'),
                "img" => asset('img/certification/mutu.jpg')
            ),
            array(
                "nama" => __('about.certification.pkrt'),
                "img" => asset('img/certification/mutu-pkrt.jpg')
            ),
            array(
                "nama" => __('about.certification.safety'),
                "img" => asset('img/certification/keselamatan-dan-kesehatan-kerja.jpg')
            ),
        ]);

@endphp

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-full">
        <!-- Dummy content -->
        <div class="row justify-content-center">
            @foreach($data as $d)
            <div class="col-lg-3 items-push js-gallery animated fadeIn">
                <a class="block block-shadow-2 block-bordered block-rounded img-link img-link-zoom-in img-lightbox"
                href="{{ $d['img'] }}">
                    <div class="block-content block-content-full p-0">
                        <img src="{{ $d['img'] }}" class="img-fluid">
                    </div>
                    <div class="block-content">
                        <h3 class="font-size-18 font-weight-bold text-center">{{ $d['nama'] }}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <!-- END Dummy content -->
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
    <script src="{{ asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script>jQuery(function(){ Codebase.helpers('magnific-popup'); });</script>
@endpush