@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-taginput/tagsinput.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection

@section('content')
<div class="content">
    <form id="form-post" onsubmit="return false;" enctype="multipart/form-data">
    @csrf
    <div class="content-heading pt-0 mb-3">
        Tambah Berita
        <button type="submit" class="btn btn-alt-primary float-right">
            <i class="si si-check mr-5"></i>
            Simpan
        </button>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="block block-shadow block-rounded block-bordered">
                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#indonesia-link">Indonesia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#english-link">English</a>
                    </li>
                </ul>
                <div class="block-content  tab-content px-1 py-2">
                    <div class="tab-pane active" id="indonesia-link" role="tabpanel">
                        <div class="form-group">
                            <label class="col-12" for="field-title">Judul</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="field-title" name="title">
                                <div class="invalid-feedback" id="error-title">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="field-description">Deskripsi</label>
                            <div class="col-12">
                                <textarea class="form-control post-desc" id="field-description" name="description" rows="8"></textarea>
                                <div class="invalid-feedback" id="error-description">Invalid feedback</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="english-link" role="tabpanel">
                        <div class="form-group">
                            <label class="col-12" for="field-en_title">Title</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="field-en_title" name="en_title">
                                <div class="invalid-feedback" id="error-en_title">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12" for="field-en_description">Description</label>
                            <div class="col-12">
                                <textarea class="form-control post-desc" id="field-en_description" name="en_description" rows="8"></textarea>
                                <div class="invalid-feedback" id="error-en_description">Invalid feedback</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="font-size-24 border-bottom">SEO</div>
                    </div>

                    <div class="form-group">
                        <label class="col-12" for="seo_keyword">SEO Keyword</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="seo_keyword" name="seo_keyword">
                            <div class="form-text text-muted font-size-sm text-right">Gunakan tanda koma "," sebagai pemisah!</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-12" for="seo_tags">SEO Tags</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="seo_tags" name="seo_tags">
                            <div class="form-text text-muted font-size-sm text-right">Gunakan tanda koma "," sebagai pemisah!</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-12" for="seo_deskripsi">SEO Deksripsi</label>
                        <div class="col-12">
                            <textarea class="form-control" id="deskripsi_seo" name="seo_deskripsi" maxlength="115" data-always-show="true" data-placement="top"></textarea>
                            <div class="form-text text-muted font-size-sm text-right">Maksimal 115 Karakter</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="block block-shadow block-rounded block-bordered">
                <div class="block-content">
                    <div class="form-group row mb-3">
                        <div class="col-lg-12">
                            <div class="content-heading mb-0 pt-0">Status</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12">Publikasi</label>
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
                    <div class="form-group row mb-3">
                        <div class="col-lg-12">
                            <div class="content-heading mb-0 pt-0">Kategori</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <select class="form-control" name="kategori" id="field-kategori"></select>
                            <div class="invalid-feedback" id="error-kategori">Invalid feedback</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-lg-12">
                            <div class="content-heading mb-0 pt-0">Media Info</div>
                        </div>
                    </div>
                    <div class="row gutters-tiny items-push">
                        <label class="col-12">Thumbnail</label>
                        <div class="col-lg-12">
                            <div class="text-center mb-15">
                                <img id="img_preview" src="{{ asset('img/placeholder/thumbnail.jpg') }}" width="100%">
                            </div>
                            <div class="btn btn-alt-primary btn-block">
                                <input type="hidden" id="featured_img" name="featured_img" value="">
                                <input type="file" class="file-upload" id="file-upload" accept="image/*">
                                Pilih Foto
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@include('include.modal_crop')
@stop

@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="{{ asset('js/plugins/bootstrap-taginput/tagsinput.js') }}"></script>
<script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/admin/post/form.js') }}"></script>
<script src="{{ asset('js/admin/seo_post.js') }}"></script>
@endpush
