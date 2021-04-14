@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Detail Pesan
        <button type="button" class="btn btn-secondary float-right btn-sm btn-reply" data-toggle="modal" data-target="#reply">Balas</button>
    </div>
    <div class="block block-rounded block-shadow block-bordered mb-5">
        <div class="block-content block-content-full">

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group row mb-1">
                        <label class="col-4 col-lg-12 mb-0">Nama Lengkap</label>
                        <div class="col-8 col-lg-12">
                            <div class="font-size-14-down-lg font-size-16 form-control-plaintext py-0 text-lg-left text-right">
                                {{ $data->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group row mb-1">
                        <label class="col-4 col-lg-12 mb-0">Alamat Email</label>
                        <div class="col-8 col-lg-12">
                            <div class="font-size-14-down-lg font-size-16 form-control-plaintext py-0 text-lg-left text-right">
                                {{ $data->email }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group row mb-1">
                        <label class="col-4 col-lg-12 mb-0">No. Telepon</label>
                        <div class="col-8 col-lg-12">
                            {{ $data->phone }}
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-1 border-2x"/><div class="row">
                <div class="col-lg-4">
                    <div class="form-group row mb-1">
                        <label class="col-4 col-lg-12 mb-0">Kategori</label>
                        <div class="col-8 col-lg-12">
                            <div class="font-size-14-down-lg font-size-16 form-control-plaintext py-0 text-lg-left text-right">
                                {{ $data->category }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group row mb-1">
                        <label class="col-4 col-lg-12 mb-0">Profesi</label>
                        <div class="col-8 col-lg-12">
                            <div class="font-size-14-down-lg font-size-16 form-control-plaintext py-0 text-lg-left text-right">
                                {{ $data->profession }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group row mb-1">
                        <label class="col-4 col-lg-12 mb-0">Subjek</label>
                        <div class="col-8 col-lg-12">
                            {{ $data->subject }}
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-1 border-2x"/>
            {{ $data->description }}
        </div>
    </div>
</div>
<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form id="form-reply" onsubmit="javascript:void(0);">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Balas Pesan</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group">
                        <label for="field-subject">Subjek</label>
                        <input class="form-control" name="subject" id="field-subject">
                    </div>
                    <div class="form-group">
                        <label for="field-description">Description</label>
                        <textarea name="description" class="form-control" id="field-description" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                  <i class="si si-close mr-2"></i>
                  Keluar
                </button>
              <button type="button" class="btn btn-primary">
                    <i class="si si-paper-plane mr-2"></i>
                    Kirim
                </button>
            </div>
          </form>
      </div>
    </div>
  </div>
@stop
@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/admin/contact.js') }}"></script>
@endpush
