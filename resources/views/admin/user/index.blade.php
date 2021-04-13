@extends('admin.layouts.master')

@section('styles')
<style>
</style>
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="content">
    <div class="content-heading pt-3 mb-3 d-none d-md-block">
        Kelola Pengguna
    </div>
    <div class="block block-rounded block-shadow block-bordered mb-5">
        <div class="block-content px-0 py-0">
            <table class="table table-striped table-vcenter mb-0 w-100 mt-0" id="list-data">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">NO</th>
                        <th>NAMA</th>
                        <th>E-MAIL</th>
                        <th>USERNAME</th>
                        <th>ROLE</th>
                        <th width="10%">AKSI</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/admin/user.js') }}"></script>
@endpush
