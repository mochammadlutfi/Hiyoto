@extends('umum.layouts.master')

@section('styles')
<style>
    .prod-title {
        position: absolute;
        bottom: 30px;
        z-index: 1000;
        font-size: 20px;
        color: white;
        padding: 0 10px;
    }

</style>
@endsection

@section('content')
<!-- Hero -->
<!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
<div class="bg-video" data-vide-bg="{{ asset('video/intro') }}" data-vide-options="posterType: jpg">
    <div class="intro-h mt-lg-20"></div>
</div>

<div class="bg-white">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="bg-white font-size-18 p-20 text-center" style="border-radius: 9px;margin-top:-40px;">
                <p><?=  __('home.intro'); ?></p>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dummy content -->
        <div class="position-relative">
            <h2 class="font-w700 text-center mb-25">
                <?= __('home.our_product'); ?>
            </h2>
        </div>
        <div class="row justify-content-center">
            @foreach($categories as $category)
            <div class="col-6 col-lg-2">
                <div class="block block-link-shadow block-rounded js-appear-enabled animated fadeInUp" href="#">
                    <div class="block-content p-0 overflow-hidden">
                        <a class="img-link" href="{{ route('product.category', $category->translate()->slug) }}">
                            <div class="prod-title">
                                {{ $category->translate()->title }}
                            </div>
                            <img class="img-fluid rounded-top" src="{{ asset($category->thumbnail_url) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- END Dummy content -->
    </div>
    <!-- END Page Content -->

    <div class="bg-bg-white pt-100">
        <div style="background: #c7383e url('https://hiyoto.com/excitingcolor/wp-content/uploads/2020/04/4.png'); background-size: cover; background-repeat: repeat-x; background-position: top left">
            <div class="row no-gutters">
                <div class="col-md-4 d-lg-block d-none">
                    <div style="position: absolute;top: -100px;">
                        <img src="{{ asset('img/machine.png') }}" class="w-75">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="py-50 text-center text-white ">
                        <h1 class="font-w700 mb-10 text-white"><?= __('home.innovation.title') ?></h1>
                        <p><?= __('home.innovation.text') ?></p>
                    </div>
                </div>
                <div class="col-md-4 d-lg-block d-none">
                    <div style="position: absolute;top: -100px;">
                        <img src="{{ asset('img/lightscate.png') }}" class="w-75">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="content content-full">
            <div class="py-10">
                <div class="position-relative">
                    <h2 class="font-w700 text-center mb-10">
                        <?= __('home.our_brands'); ?>
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn">
                        <img src="{{ asset('img/brands/Arca.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn" data-timeout="150">
                        <img src="{{ asset('img/brands/Brillo.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn" data-timeout="150">
                        <img src="{{ asset('img/brands/Flexy.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn" data-timeout="150">
                        <img src="{{ asset('img/brands/Hubber.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn">
                        <img src="{{ asset('img/brands/Maribond.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn" data-timeout="150">
                        <img src="{{ asset('img/brands/Maritex.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn" data-timeout="150">
                        <img src="{{ asset('img/brands/Premio.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-3 py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn" data-timeout="150">
                        <img src="{{ asset('img/brands/Sanlex.jpg') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="content content-full">
            <div class="py-15">
                <div class="position-relative">
                    <h2 class="font-w700 text-center mb-20">
                        <?= __('home.latest_news'); ?>
                    </h2>
                </div>
                <div class="row justify-content-center">
                    
                    @foreach($posts as $post)
                    <div class="col-6 col-xl-4 px-1">
                        <div class="block block-shadow block-bordered mb-2">
                            <div class="block-content block-content-full p-0">
                                <a class="badge badge-primary font-w700 badge-kategori p-2 text-white">
                                    {{ $post->category->translate()->title }}
                                </a>
                                <a  href="#">
                                    <img src="{{ asset($post->featured_img_url) }}" class="img-fluid" />
                                </a>
                            </div>
                            <div class="block-content p-3">
                                <h2 class="font-size-14-down-lg font-size-18 font-w700 mb-1" style="min-height: 46px;">
                                    <a class="title"  href="{{ route('post.detail', $post->translate()->slug) }}">{{ $post->translate()->title }}</a>
                                </h2>
                                <div class="row">
                                    <div class="col">
                                        <span class="text-muted">
                                            <i class="si si-clock mr-1"></i> {{ ucwords($post->dibuat) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/jquery-vide/jquery.vide.min.js') }}"></script>
@endpush
