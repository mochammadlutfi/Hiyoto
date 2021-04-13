@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<style>
.clearable{
  background: #fff url(http://bijudesigner.com/blog/wp-content/uploads/2015/06/download.gif) no-repeat right -10px center;
  padding: 3px 18px 3px 4px; /* Use the same right padding (18) in jQ! */
  transition: background 0.4s;
}
.clearable.x  { background-position: right 5px center; }
.clearable.onX{ cursor: pointer; }
</style>

@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Daftar Produk
        <a href="{{ route('admin.product.add') }}" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
            <i class="si si-plus mr-5"></i>
            Tambah Produk Baru
        </a>
    </div>
    <div class="block block-rounded block-shadow block-bordered d-md-block d-none mb-10">
        <div class="block-content p-2">
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="has-search">
                        <i class="fa fa-search"></i>
                        <input type="search" class="form-control" id="search-data-list" name="keyword">
                    </div>
                </div>
                <div class="col-4">
                    {{-- <select class="form-control" id="kategori" placeholder="Semua Kategori"></select> --}}
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-8 m-auto" id="content-nav">
                            <span>Navigasi</span>
                        </div>
                        <div class="col-md-4 pt-25 pl-0">
                            <button type="button" class="btn btn-alt-secondary float-right" id="next-data-list">
                                <i class="fa fa-chevron-right fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-alt-secondary float-left" id="prev-data-list">
                                <i class="fa fa-chevron-left fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block block-rounded block-shadow block-bordered mb-5">
        <div class="block-content px-0 py-0">
            <input type="hidden" id="current_page" value="1">
            <table class="table table-striped table-vcenter table-hover mb-0" id="data-list">
                <thead class="thead-light">
                    <tr>
                        <th width="2%">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="example-checkbox1" id="example-checkbox1" value="option1">
                                <label class="custom-control-label" for="example-checkbox1"></label>
                            </div>
                        </th>
                        <th colspan="2">Produk</th>
                        <th width="10%">Dilihat</th>
                        <th width="20%">Dibuat</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="loading" class="data-row d-none">
                        <td colspan="7">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center py-50">
                                    <div class="spinner-border text-primary wh-50" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/admin/product/index.js') }}"></script>
@endpush
