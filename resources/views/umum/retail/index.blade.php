@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<style>
.list-scroll{
    min-height: 500px;
    overflow-y: scroll;
    display: block;
    height: 500px;
}
    </style>
@endsection


@section('content')
<!-- Hero -->
<div class="bg-image mt-lg-4" style="background-image: url({{ asset('img/hero/retail.jpg') }});">
    <div class="bg-black-op-75">
        <div class="content text-center">
            <div class="py-50 pb-20">
                <h1 class="font-w700 mb-10 text-white">{{ __('front_menu.retail.title') }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-full px-lg-0">
        <div class="row">
            <div class="col-lg-4">
                <form>
                    <div class="form-group">
                        <select class="form-control find-daerah" id="filter-daerah" name="daerah"></select>
                    </div>
                </form>
                <input type="hidden" name="page" value="1" id="page">
                <div class="list-scroll pr-lg-3">
                    <div id="dataContent" role="tablist" aria-multiselectable="true"></div>
                    <button type="button" id="btn-loadMore" class="btn btn-outline-primary btn-block d-none">Load More</button>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="map" style="width: 100%; height: 100%; position:fixed"></div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZcJ2vFTmpW6HQvhsL3A6pet5Tauvz3io" async></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
<script src="{{ asset('js/umum/retail.js') }}"></script>
@endpush