@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Kontak Pesan
    </div>
    <div class="block block-rounded block-shadow block-bordered mb-5">
        <div class="block-content px-0 py-0">
            <input type="hidden" id="current_page" value="1">
            <table class="table table-striped table-vcenter table-hover mb-0" id="data-list">
                <thead class="thead-light">
                    <tr>
                        <th width="2%">
                            <div class="custom-control custom-checkbox mb-5">
                                <input class="custom-control-input" type="checkbox" name="example-checkbox1" id="example-checkbox1" value="option1">
                                <label class="custom-control-label" for="example-checkbox1"></label>
                            </div>
                        </th>
                        <th width="15%">NAMA</th>
                        <th width="20%">KONTAK</th>
                        <th width="20%">PESAN</th>
                        <th width="10%">TANGGAL</th>
                        <th width="15%">STATUS</th>
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
<script src="{{ asset('js/admin/contact.js') }}"></script>
@endpush
