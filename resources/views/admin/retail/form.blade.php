@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content">
    <form id="form-retail" onsubmit="return false;" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="lat" id="lat" value="">
    <input type="hidden" name="lng" id="lng" value="">
    <div class="content-heading pt-0 mb-3">
        Tambah Kantor Cabang
        <button type="submit" class="btn btn-primary mr-5 mb-5 float-right no-border">
            <i class="si si-paper-plane mr-5"></i>
            Simpan
        </button>
    </div>
    <div class="block block-shadow block-rounded block-bordered">
        <div class="block-content py-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="field-name">Nama</label>
                        <input type="text" class="form-control" id="field-name" name="name">
                        <div class="invalid-feedback" id="error-name">Invalid feedback</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="field-daerah">Daerah</label>
                                <select class="form-control find-daerah" id="field-daerah" name="daerah"></select>
                                <div class="invalid-feedback" id="error-daerah">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="field-postal_code">Kode POS</label>
                                <input type="text" class="form-control" id="field-postal_code" name="postal_code">
                                <div class="invalid-feedback" id="error-postal_code">Invalid feedback</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="field-address">Alamat</label>
                        <textarea class="form-control" id="field-address" name="address" rows="5"></textarea>
                        <div class="invalid-feedback" id="error-address">Invalid feedback</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    
    <div class="block block-shadow block-rounded block-bordered">
        <div class="block-content block-content-sm">
            <div class="input-group input-group-lg py-10">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                <input type="text" id="search-box" class="form-control" placeholder="Masukan Nama Jalan Atau Alamat">
            </div>
        </div>
        <!-- Search Map Container -->
        <div id="map" style="height: 500px;"></div>
    </div>
</div>

@include('include.modal_crop')
@stop

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZcJ2vFTmpW6HQvhsL3A6pet5Tauvz3io&libraries=places" async></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/admin/retail/form.js') }}"></script>
@endpush
