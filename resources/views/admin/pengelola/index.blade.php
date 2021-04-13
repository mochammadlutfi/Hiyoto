@extends('admin.layouts.master')

@section('styles')
<style>
    #list-pengguna_filter {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="content">
    <div class="content-heading pt-3 mb-3 d-none d-md-block">
        Kelola Pengguna
        <button id="btn_tambah" type="button" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
            <i class="si si-plus mr-5"></i>
            Tambah Pengguna
        </button>
    </div>
    <div class="block block-rounded block-shadow block-bordered">
        <div class="block-content">
            <table class="table table-hover table-striped" id="list-pengguna">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPengguna" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-transparent mb-0">
                <div class="block-header bg-alt-secondary">
                    <h3 class="block-title" id="modal_title">Form Title</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="form-pengguna" class="form-horizontal">
                        @csrf
                        <input type="hidden" id="field-id" value="" name="id"/>
                        <input type="hidden" value="tambah" id="metode"/>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="field-nama" placeholder="Masukan Nama Lengkap">
                                <div id="error-nama" class="invalid-feedback"></div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="col-form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="field-username" placeholder="Masukan Username">
                                <div id="error-username" class="invalid-feedback"></div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="col-form-label">Alamat Email</label>
                                <input type="email" class="form-control" name="email" id="field-email" placeholder="Masukan Alamat Email">
                                <div id="error-email" class="invalid-feedback"></div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="col-form-label">Jabatan</label>
                                <select class="form-control" name="jabatan" id="field-jabatan">
                                    <option value="">Pilih</option>
                                    <option value="super-admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="kabag">Kabag</option>
                                    <option value="ketua-DPRD">Ketua DPRD</option>
                                </select>
                                <div id="error-jabatan" class="invalid-feedback"></div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="field-password" placeholder="Masukan Password">
                                <div id="error-password" class="invalid-feedback"></div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="col-form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="konf_password" id="field-konf_password" placeholder="Masukan Konfirmasi Password">
                                <div id="error-konf_password" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-5"></i>Simpan</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/js/admin/pengguna.js') }}"></script>
@endpush
