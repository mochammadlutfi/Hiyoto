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
                <h2 class="h4 font-w400 text-muted">{{ __('front_menu.vission_mission') }}</h2>
            </div>
        </div>
    </div>
{{-- </div> --}}
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white"> 
    <div class="content content-full">
        <!-- Dummy content -->
        <div class="row justify-content-center mb-30">
            <div class="col-lg-8">
                <img src="{{ asset('img/hero/visi-misi.jpg') }}" class="img-fluid rounded"/>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="block block-shadow-2 block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('about.visi.title') }}</h3>
                    </div>
                    <div class="block-content py-15">
                        <p class="font-size-16"><?= __('about.visi.desc'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="block block-shadow-2 block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('about.misi.title') }}</h3>
                    </div>
                    <div class="block-content py-10 px-0">
                        <ul class="fa-ul list list-simple-mini push">
                            <li>
                                <i class="fa fa-check fa-li text-success"></i>
                                Berkomitmen untuk mewujudkan kepuasan pelanggan melalui produk berkualitas dan inovatif.
                            </li>
                            <li>
                                <i class="fa fa-check fa-li text-success"></i>
                                Berkomitmen untuk menjadi perusahaan panutan dengan keunggulan kompetitif yang ditekankan kepada inovasi produk berkualitas, kapabilitas sumber daya manusia, dan pengelolaan bisnis berkelanjutan.
                            </li>
                        </ul>
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