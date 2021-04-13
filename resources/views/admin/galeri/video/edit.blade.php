@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Elements -->
            <div class="block">
                <div class="block-content">
                    <form id="form-video" onsubmit="return false;" enctype="multipart/form-data">
                        <input type="hidden" name="video_id" id="video_id" value="{{ $video->id }}">
                        <input type="hidden" name="cover_url" id="cover_url" value="">
                        <input type="hidden" id="featured_img" name="featured_img" value="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group row">
                                    <label class="col-12" for="field-url">URL Video</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="field-url" name="url" placeholder="Masukan URL Video (Youtube)" value="{{ $video->url }}">
                                        <div class="invalid-feedback" id="error-url">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="field-judul">Judul Video</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="field-judul" name="judul" placeholder="Masukan Judul Video" value="{{ $video->judul }}">
                                        <div class="invalid-feedback" id="error-judul">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12">Deskripsi</label>
                                    <div class="col-12">
                                        <textarea class="form-control" id="field-deskripsi" name="deskripsi" placeholder="Masukan Deskripsi Video" rows="8">{{ $video->deskripsi }}</textarea>
                                        <div class="invalid-feedback" id="error-deskripsi">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row mb-3">
                                    <div class="col-lg-12">
                                        <div class="content-heading mb-0 pt-0">Status</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12">Publikasi</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-primary css-radio">
                                            <input type="radio" class="css-control-input" id="status_publikasi" name="status" value="1" {{ $video->status === 1 ? 'checked' : '' }}>
                                            <span class="css-control-indicator"></span> Publikasikan
                                        </label>
                                        <label class="css-control css-control-secondary css-radio">
                                            <input type="radio" class="css-control-input" id="status_draft" name="status" value="0" {{ $video->status === 0 ? 'checked' : '' }}>
                                            <span class="css-control-indicator"></span> Draft
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-5"></i>Simpan</button>
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
                                        <div class="text-center">
                                            <img id="img_preview" src="{{ asset(empty($video->thumbnail) ? "assets/img/poster.png" : $video->thumbnail) }}" width="100%">
                                        </div>
                                        <div class="text-danger" id="error-foto"></div>
                                        <div class="btn btn-alt-primary btn-block mt-15">
                                            <input type="file" class="file-upload" id="file-upload" accept="image/*">
                                            Pilih Foto
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>

@include('include.modal_crop')
@stop

@push('scripts')
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/admin/video/edit.js') }}"></script>
@endpush
