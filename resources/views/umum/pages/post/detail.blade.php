@extends('umum.layouts.master')
@section('styles')
<style>
    .container {
        padding: 50px;
        text-align: center;
    }

    /* Solid Social Share Buttons */

    .btn-social,
    .btn-social:visited,
    .btn-social:focus,
    .btn-social:hover,
    .btn-social:active {
        color: #ffffff;
        text-decoration: none;
        transition: opacity .15s ease-in-out;
    }

    .btn-social:hover,
    .btn-social:active {
        opacity: .75;
    }

    .btn-fb {
        background-color: #3b5998;
    }

    .btn-tw {
        background-color: #1da1f2;
    }

    .btn-in {
        background-color: #0077b5;
    }

    .btn-wa {
        background-color: #25d366;
    }

    .btn-line {
        background-color: #00c300;
    }

    .btn-hn {
        background-color: #ff4000;
    }


    /* Fluid Styles */

    .fluid {
        display: flex;
    }

    .fluid a {
        flex-grow: 1;
        margin-right: 0.25rem;
    }

    .fluid a:last-child {
        margin-right: 0rem;
    }

    .list-category-1{
        padding: 0;
        margin: 0;
    }
    .list-category-1-item.widget-category .list-category-1 li {
        padding-bottom: 0;
    }

    .list-category-1-item .list-category-1 li a:last-child {
        margin-bottom: 0;
    }
    .list-category-1-item .list-category-1 li a {
        position: relative;
        width: 100%;
        padding: 15px;
        background: #c7383e38;
        color: rgb(37 34 34);
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-weight: 600;
        font-size: 16px;
        border-radius: 5px;
        -ms-border-radius: 5px;
        overflow: hidden;
    }

    .list-category-1-item.widget_category .list-category-1 li a:hover {
        color: #c7383e;
    }

    .list-category-1-item .list-category-1 li a:last-child {
        margin-bottom: 0;
    }
    .list-category-1-item .list-category-1 li a:hover {
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.03);
        transform: scale(1.03);
        will-change: transform;
        transition: -webkit-transform 0.35s cubic-bezier(.25,.46,.45,.94);
    }

    .list-category-1-item.widget_category .list-category-1 li {
        padding-bottom: 0;
    }
    .list-category-1-item .list-category-1 li {
        list-style-type: none;
        margin-bottom: 5px;
        position: relative;
    }
    .list-category-1-item .list-category-1 li a span {
    position: relative;
    white-space: nowrap;
    color: #c7383e;
}

.list-category-1-item .list-category-1 li a .category-count {
    position: absolute;
    background: #c7383e;
    color: #fff;
    padding: 5px;
    width: 40px;
    right: 20px;
    top: 44px;
    margin-top: 12px;
    border-radius: 50%;
    display: inline-block;
    height: 40px;
    text-align: center;
    line-height: 32px;
    top: 0;
    bottom: 0;
    margin: auto;
}
</style>
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10">{{ __('front_menu.news.title') }}</h1>
            <h2 class="h4 font-w400 text-muted">{{ $post->translate()->title }}</h2>
        </div>
    </div>
</div>
<!-- END Hero -->

<div class="bg-white">
    
<div class="content content-full">
    <div class="row">
        <div class="col-lg-8">
            <div class="block block-transparent">
                <div class="block-content px-0 pt-0">
                    <img src="{{ asset($post->featured_img) }}" alt="{{ $post->translate()->title }}" class="img-fluid">
                </div>
                <div class="block-content pb-25 px-0">
                    <h2 class="font-size-h3 mb-2">{{ $post->translate()->title }}</h2>
                    <div class="row">
                        <div class="col-lg col-6">
                            <a href="" class="badge badge-primary">{{ $post->category->translate()->title }}</a>
                        </div>
                        <div class="col-lg col-6">
                            <span class="text-muted">
                                <i class="si si-clock text-muted mr-5"></i> <strong>{{ $post->dibuat }}</strong>
                            </span>
                        </div>
                        <div class="col-lg col-6">
                            <span class="text-muted">
                                <i class="si si-eye text-muted mr-5"></i> {{ $post->views }}x {{ __('front_menu.news.views') }}
                            </span>
                        </div>
                    </div>
                    <hr class="border-2x mt-1"/>
                    <?= $post->translate()->description; ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg col">
                    <button type="button" class="btn btn-sm btn-social btn-tw btn-block" data-sharer="twitter" data-url="{{ route('post.detail', $post->translate()->slug) }}">
                        <i class="fab fa-twitter fa-2x"></i>
                    </button>
                </div>
                <div class="col-lg col">
                    <button type="button" class="btn btn-sm btn-social btn-fb btn-block" data-sharer="facebook" data-hashtag="hashtag" data-url="{{ route('post.detail', $post->translate()->slug) }}">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </button>
                </div>
                <div class="col-lg col">
                    <button type="button" class="btn btn-sm btn-social btn-in btn-block" data-sharer="linkedin" data-url="{{ route('post.detail', $post->translate()->slug) }}">
                        <i class="fab fa-linkedin-in fa-2x" data-fa-transform="grow-2"></i>
                    </button>
                </div>
                <div class="col-lg col">
                    <button type="button" class="btn btn-sm btn-social btn-wa btn-block" data-sharer="whatsapp" data-url="{{ route('post.detail', $post->translate()->slug) }}">
                        <i class="fab fa-whatsapp fa-2x" data-fa-transform="grow-2"></i>
                    </button>
                </div>
                <div class="col-lg col">
                    <button type="button" class="btn btn-sm btn-social btn-line btn-block" data-sharer="line" data-url="{{ route('post.detail', $post->translate()->slug) }}">
                        <i class="fab fa-line fa-2x" data-fa-transform="grow-2"></i>
                    </button>
                </div>
            </div>
        </div>
        {{-- Sidebar --}}
        <div class="col-lg-4">
            @widget('news_category')
            @widget('popular_posts')
        </div>
        {{-- End Sidebar --}}
    </div>
    </div>
</div>
</div>
@stop
@push('scripts')
@endpush
