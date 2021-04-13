@extends('umum.layouts.master')


@section('styles')

<link rel="stylesheet" href="{{ asset('assets/js/plugins/magnific-popup/magnific-popup.css') }}">
<style>
.hovereffect {
width:100%;
height:100%;
float:left;
overflow:hidden;
position:relative;
text-align:center;
cursor:default;
}

.hovereffect .overlay {
width:100%;
height:100%;
position:absolute;
overflow:hidden;
top:0;
left:0;
opacity:0;
background-color:rgba(0,0,0,0.5);
-webkit-transition:all .4s ease-in-out;
transition:all .4s ease-in-out
}

.hovereffect img {
display:block;
position:relative;
-webkit-transition:all .4s linear;
transition:all .4s linear;
}

.hovereffect h2 {
text-transform:uppercase;
color:#fff;
text-align:center;
position:relative;
font-size:17px;
background:rgba(0,0,0,0.6);
-webkit-transform:translatey(-100px);
-ms-transform:translatey(-100px);
transform:translatey(-100px);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
padding:10px;
}

.hovereffect a.info {
text-decoration:none;
display:inline-block;
text-transform:uppercase;
color:#fff;
border:1px solid #fff;
background-color:transparent;
opacity:0;
filter:alpha(opacity=0);
-webkit-transition:all .2s ease-in-out;
transition:all .2s ease-in-out;
margin:50px 0 0;
padding:7px 14px;
}

.hovereffect a.info:hover {
box-shadow:0 0 5px #fff;
}

.hovereffect:hover img {
-ms-transform:scale(1.2);
-webkit-transform:scale(1.2);
transform:scale(1.2);
}

.hovereffect:hover .overlay {
opacity:1;
filter:alpha(opacity=100);
}

.hovereffect:hover h2,.hovereffect:hover a.info {
opacity:1;
filter:alpha(opacity=100);
-ms-transform:translatey(0);
-webkit-transform:translatey(0);
transform:translatey(0);
}

.hovereffect:hover a.info {
-webkit-transition-delay:.2s;
transition-delay:.2s;
}
.overlay .overlay-content {
    position: absolute;
    top: 50%;
    right: auto;
    left: auto;
    transform: translateX(0) translateY(-50%);
    right: 0;
    left: 0;
    text-align: center;
}
</style>
@endsection
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
     <!-- Blog -->
     <section class="section-md bg-white pt-md-70 pb-md-40 pt-sm-50 pb-sm-20 pt-xs-40 pb-xs-10">
        <div class="container">
            @if ($data->count())
            <input type="hidden" id="current_page" value="1">
            <div class="card-columns js-gal">
                @foreach($data as $f)
                <div class="card hovereffect">
                    <img class="img-responsive card-img" src="{{ asset($f->path) }}" alt="">
                    <div class="overlay">
                        <div class="overlay-content">
                            <a class="info mt-3 img-lightbox" href="{{ asset($f->path) }}">Lihat</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="row justify-content-center">
                <img src="{{ asset('img/placeholder/data_not_found.png') }}">
            </div>
            @endif
        </div>
    </section>
    <!-- Blog end -->

    <!-- banner end -->
    {{-- <div class="content content-full">
        <section>
            @if($data->count() > 1)
            <div id="masonry" class="gallery-wrapper">
                <div class="col-lg-3 col-6 grid-sizer"></div>
                @foreach($data as $f)
                <div class="col-lg-3 col-6 grid-item">
                    <div class="block block-rounded block-shadow">
                        <div class="block-content p-0">
                            <div class="animated fadeIn">
                                <div class="options-container">
                                    <img class="img-fluid options-item" src="{{ asset($f->path) }}" alt="">
                                    <div class="options-overlay">
                                        <div class="options-overlay-content">
                                            <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="{{ asset($f->path) }}">
                                                <i class="fa fa-search-plus"></i> Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <input type="hidden" id="current_page" value="1">
            @else
            <div class="block block-bordered block-shadow block-rounded" id="empty">
                <div class="block-content">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <img class="img-fluid" src="{{ asset('assets/img/icon/doc_empty.png') }}">
                            <div class="mb-15">
                                <h3 class="font-size-24 font-w600 mt-3">Foto Tidak Ditemukan</h3>
                                <a class="btn btn-primary btn-lg px-50" href="{{ route('galeri.foto') }}">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row justify-content-center d-none" id="loadingContent">
                <div class="col-lg-6 text-center pb-100">
                    <div class="spinner-border text-primary wh-50" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha512-JRlcvSZAXT8+5SQQAvklXGJuxXTouyq8oIMaYERZQasB8SBDHZaUbeASsJWpk0UUrf89DP3/aefPPrlMR1h1yQ==" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/umum/galeri.js') }}"></script>
<script>
    jQuery(".js-gal:not(.js-gal-enabled)").each(function (e, t) {
        jQuery(t)
            .addClass("js-gal-enabled")
            .magnificPopup({
                delegate: "a.img-lightbox",
                type: "image",
                gallery: {
                    enabled: !0
                }
            });
    });
</script>
@endpush
