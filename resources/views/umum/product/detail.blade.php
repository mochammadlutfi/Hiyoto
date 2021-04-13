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
                    {{ $data->category->translate()->title }}
                    {{ $data->title }}
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-full">
        <!-- Dummy content -->
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="block block-shadow-2 block-rounded block-bordered">
                    <div class="block-content text-center py-15">
                            <img src="{{ $data->image_url }}" class="w-75" />
                            <h2 class="font-weight-bold font-size-24">
                                {{ $data->title }}</h2>
                            <a href="" class="btn btn-outline-primary btn-block">
                                <i class="fa fa-store"></i>
                                Temukan Toko
                            </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="block block-shadow-2 block-rounded block-bordered">
                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#productDeskripsi">{{ __('product.description') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#productApplication">{{ __('product.application') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#productTechnical">{{ __('product.technical') }}</a>
                        </li>
                    </ul>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="productDeskripsi" role="tabpanel">
                            {!! $data->translate()->description !!}
                        </div>
                        <div class="tab-pane" id="productApplication" role="tabpanel">
                            {!! $data->translate()->application; !!}
                        </div>
                        <div class="tab-pane" id="productTechnical" role="tabpanel">
                            {!! $data->translate()->technical; !!}
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