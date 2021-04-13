@extends('umum.layouts.master')

@section('content')
    
<div class="page-content">

    <!-- Inner Banner -->
    <section class="inner-banner">
        <div class="titlebar-main">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="inner-page-title">Galeri Foto</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- Blog -->
    <section class="section-md bg-white pt-md-70 pb-md-40 pt-sm-50 pb-sm-20 pt-xs-40 pb-xs-10">
        <div class="container">
            <div class="row justify-content-center">
                @forelse($galeri as $g)
                <div class="col-6 col-lg-3 col-xl-4 mb-4">
                    <a href="{{ route('galeri.detail', $g->slug) }}">
                        <div class="card card-shadow">
                            <div class="card-thumbnail">
                                <img src="{{ asset($g->foto) }}" class="img-fluid" alt="{{  $g->nama }}">
                            </div>
                            <div class="card-body">
                                <h2 class="title">{{  $g->nama }}</h2>
                                <div>
                                    <i class="fa fa-image"></i>
                                    {{ $g->fotonya()->count() }} Photos
                                </div>
                                <div>
                                    <i class="optico-icon-clock"></i>
                                    {{ $g->dibuat }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div class="col-lg-6">
                    <img src="{{ asset('assets/img/placeholder/data_not_found.png') }}" class="img-fluid">
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog end -->
</div>
@endsection