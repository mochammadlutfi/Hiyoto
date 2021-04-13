@extends('umum.layouts.master')

@section('styles')
    
@endsection


@section('content')
<!-- Hero -->
{{-- <div class="bg-image" style="background-image: url('assets/media/photos/photo27@2x.jpg');"> --}}
    <div class="bg-body-light">
        <div class="content text-center">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 mb-10">{{ __('front_menu.about_us') }}</h1>
                <h2 class="h4 font-w400">{{ __('front_menu.our_history') }}</h2>
            </div>
        </div>
    </div>
{{-- </div> --}}
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-full">
        <!-- Dummy content -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="block">
                    <div class="block-content">
                        <img src="{{ asset('img/hero/sejarah.jpg') }}" class="img-fluid rounded">
                        <div class="py-15">
                            <?= __('about.history'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Dummy content -->
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
    
@endpush