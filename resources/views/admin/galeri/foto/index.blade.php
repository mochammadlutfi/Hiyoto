@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Kelola Galeri Foto
        <button id="btn_tambah" type="button" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
            <i class="si si-plus mr-5"></i>
            Tambah Album Baru
        </button>
    </div>
    <div class="block block-rounded block-shadow block-bordered d-md-block d-none mb-10">
        <div class="block-content p-2">
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pencarian" name="keyword" placeholder="Masukan Kata Kunci">
                    </div>
                </div>
                <div class="col-4">
                    <select class="form-control">

                    </select>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-8 py-lg-2" id="content-nav">
                            <span>Berita</span>
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
    <div class="block block-rounded block-shadow block-bordered mb-5">
        <div class="block-content px-0 py-0">
            <input type="hidden" id="current_page" value="1">
            <table class="table table-striped table-vcenter mb-0" id="album-list">
                <thead class="thead-light">
                    <tr>
                        <th width="2%">
                            #
                        </th>
                        <th width="12%">Thumbnail</th>
                        <th>Judul</th>
                        <th width="10%" class="d-none d-lg-table-cell">Dilihat</th>
                        <th width="20%" class="d-none d-lg-table-cell">Dibuat</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAlbum" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-transparent mb-0">
                <form id="form-album" onsubmit="return false">
                    @csrf
                    <input type="hidden" id="field-id" value="" name="id"/>
                    <input type="hidden" value="tambah" id="metode"/>
                    <div class="block-header bg-alt-secondary">
                        <h3 class="block-title" id="modal_title">Form Title</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="field-nama">Nama Album</label>
                                    <input type="text" class="form-control" name="nama" id="field-nama" placeholder="Masukan Nama Album">
                                    <div id="error-nama" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="field-deskripsi">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="field-deskripsi" placeholder="Masukan Deskripsi Album" rows="11"></textarea>
                                    <div id="error-nama" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row gutters-tiny items-push">
                                    <label class="col-12">Thumbnail</label>
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <img id="img_preview" src="{{ asset(empty($album->foto) ? "img/poster.png" : $album->foto) }}" width="100%">
                                        </div>
                                        <div class="text-danger" id="error-foto"></div>
                                        <div class="btn btn-alt-primary btn-block mt-15">
                                            <input type="hidden" id="featured_img" name="featured_img" value="">
                                            <input type="file" class="file-upload" id="file-upload" accept="image/*">
                                            Pilih Foto
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12">Status</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-primary css-radio">
                                            <input type="radio" class="css-control-input" id="status_publikasi" name="status" value="1" checked>
                                            <span class="css-control-indicator"></span> Publikasikan
                                        </label>
                                        <label class="css-control css-control-danger css-radio">
                                            <input type="radio" class="css-control-input" id="status_draft" name="status" value="0">
                                            <span class="css-control-indicator"></span> Draft
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-check"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('include.modal_crop')
@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="{{ asset('js/admin/galeri/galeri.js') }}"></script>
<script>
</script>
@endpush
