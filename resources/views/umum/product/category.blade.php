@extends('umum.layouts.master')

@section('styles')
    
@endsection


@section('content')
<!-- Hero -->
<div class="bg-image mt-lg-4" style="background-image: url({{ asset('img/hero/produk.jpg') }});">
    <div class="bg-black-op-75">
        <div class="content text-center">
            <div class="py-50 pb-20">
                <h1 class="font-w700 mb-10 text-white">{{ __('front_menu.our_product') }}</h1>
                <h2 class="h4 font-w400 text-white">
                    {{ $data->translate()->title }}
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-full">
        @if(!$categories->isEmpty())
        <h2>Kategori Produk</h2>
        <div class="row justify-content-center">
            @foreach($categories as $c)
                <div class="col-lg-2">
                    <a class="block c-pointer block-shadow-2 block-rounded" href="{{ route('product.category', $c->translate()->slug) }}">
                        <div class="block-content block-content-full p-0">
                            <img src="{{ $c->thumbnail_url }}" class="img-fluid" />
                        </div>
                        <div class="block-content px-1">
                            <h2 class="font-size-16 text-center font-weight-bold">{{ $c->translate()->title }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        @endif
        
        @if(!$products->isEmpty())
        <h2>Produk Populer</h2>
        <div class="row">
            @foreach($products as $product)
            <div class="col-6 col-md-4 col-xl-2 px-1">
                <a class="block block-shadow-2 block-bordered block-rounded block-link-pop c-pointer"
                href="{{ route('product.detail', ['category'=> $product->category->translate()->slug,'slug'=> $product->slug]) }}">
                    <div class="block-content block-content-full p-0">
                            <img src="{{ $product->image_url }}" class="img-fluid" />
                    </div>
                    <div class="block-content py-3 px-3">
                        <div class="font-size-16 font-weight-bold">
                            {{ 
                            $product->category->translate()->title.' '.
                            $product->title 
                            }}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
    
@endpush