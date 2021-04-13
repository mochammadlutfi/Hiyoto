@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Kelola Slider
        <a href="{{ route('admin.slider.tambah') }}" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
            <i class="si si-plus mr-5"></i>
            Tambah Slider Baru
        </a>
    </div>
    <div class="block block-rounded block-shadow block-bordered d-md-block d-none mb-10">
        <div class="block-content p-2">
            <div class="row justify-content-between">
                <div class="col-4">
                    
                </div>
                <div class="col-4">
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-8 py-lg-2" id="content-nav">
                            <span>Navigasi</span>
                        </div>
                        <div class="col-md-4 pt-25 pl-0">
                            <button type="button" class="btn btn-alt-secondary float-right" id="nextProduk">
                                <i class="fa fa-chevron-right fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-alt-secondary float-left" id="prevProduk">
                                <i class="fa fa-chevron-left fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="current_page" value="1">
    <div id="content">
    </div>
</div>
@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="{{ asset('assets/js/admin/slider.js') }}"></script>
<script>
</script>
@endpush
