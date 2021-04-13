@extends('umum.layouts.master')

@section('styles')
    
@endsection


@section('content')
<!-- Hero -->
<div class="bg-image mt-lg-4" style="background-image: url({{ asset('img/hero/proyek.jpg') }});">
    <div class="bg-black-op-75">
        <div class="content text-center">
            <div class="py-lg-10">
                <h1 class="font-w700 mb-10 text-white">{{ __('project.title') }}</h1>
                <p class="font-size-20 text-white">
                    {!! __('project.description' ) !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">

    <div class="content content-full px-lg-10">
        <!-- Dummy content -->
        <div class="row justify-content-center">
            @foreach($contact as $c)
            <div class="col-lg-6 align-items-stretch">
                <div class="block block-shadow block-rounded block-bordered">
                    <div class="block-content p-2">
                        <h2 class="font-size-h5 mb-0 py-lg-2 text-center">
                            <i class="fa fa-building fa-fw mr-2"></i>
                            {{ $c['nama'] }}
                        </h2>
                    </div>
                    <hr class="border-3x my-0"/>
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#address-{{ $c['id'] }}">
                                <i class="fa fa-map-marker-alt mr-1"></i>
                                <span class="font-weight-bold">Alamat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact-{{ $c['id'] }}">
                                <i class="fa fa-phone-alt mr-1"></i>
                                <span class="font-weight-bold">Kontak</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#hunting-{{ $c['id'] }}">
                                <i class="fa fa-user mr-1"></i>
                                <span class="font-weight-bold">Hunting</span>
                            </a>
                        </li>
                    </ul>
                    <div class="block-content px-2 py-3 tab-content">
                        <div class="tab-pane active" id="address-{{ $c['id'] }}" role="tabpanel">
                            <address class="text-center mb-1">
                                Ruko Imperial Walk Kav. 29 C No. 42, Jl. Jalur Sutera<br>
                                Alam Sutera, Kota Tangerang Selatan, Banten, 15320
                            </address>
                        </div>
                        <div class="tab-pane" id="contact-{{ $c['id'] }}" role="tabpanel">
                            <div class="row px-3">
                                <div class="col-3">
                                    Telepon
                                </div>
                                <div class="col-9">
                                    : <a class="font-w600"  href="tel:021-30448539">021-30448539</a>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-3">
                                    Fax
                                </div>
                                <div class="col-9">
                                    : <a class="font-w600" href="fax:+6202130448539">021-30448539</a>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-3">
                                    Email
                                </div>
                                <div class="col-9">
                                    : <a class="font-w600" href="mailto:ralston.sby@hiyoto.com">ralston.sby@hiyoto.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="hunting-{{ $c['id'] }}" role="tabpanel">
                            <div class="row px-3">
                                <div class="col-3">
                                    Nama
                                </div>
                                <div class="col-9">
                                    : <span class="font-w600">Yuanita</span>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-3">
                                    No. HP
                                </div>
                                <div class="col-9">
                                    : <a class="font-w600"  href="tel:+6281317721097">081317721097</a>
                                </div>
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