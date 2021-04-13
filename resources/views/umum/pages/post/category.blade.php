@extends('umum.layouts.master')

@section('styles')

@endsection
@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700">{{ __('front_menu.news.title') }}</h1>
            <h2 class="h4 font-w400 text-muted">{{ $category->translate()->title }}</h2>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">
    
    <div class="content content-full">
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
        <!-- END Dummy content -->
    </div>
</div>
<!-- END Page Content -->

@stop
@push('scripts')

@endpush
