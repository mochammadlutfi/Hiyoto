@extends('admin.layouts.master')

@section('styles')
<style>
    #list-kategori_filter {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-5">
            <div class="block block-shadow block-bordered block-rounded">
                <form id="form-category" onsubmit="return false;">
                    @csrf
                    <div class="block-header block-header-default">
                        <h3 class="block-title" id="form-title">Tambah Kategori Berita</h3>
                    </div>
                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#indonesia-link">Indonesia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#english-link">English</a>
                        </li>
                    </ul>
                    <div class="block-content tab-content pb-15">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" id="metode" value="add">
                        <div class="tab-pane active" id="indonesia-link" role="tabpanel">
                            <div class="form-group">
                                <label class="col-form-label" for="field-title">Judul</label>
                                <input type="text" class="form-control" id="field-title" name="title">
                                <div class="invalid-feedback" id="error-title">Invalid feedback</div>
                            </div>
                            <div class="form-group">
                                <label for="description">Deksripsi</label>
                                <textarea class="form-control" id="field-description" name="description" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane" id="english-link" role="tabpanel">
                            <div class="form-group">
                                <label class="col-form-label" for="field-en_title">Title</label>
                                <input type="text" class="form-control" id="field-en_title" name="en_title">
                                <div class="invalid-feedback" id="error-en_title">Invalid feedback</div>
                            </div>
                            <div class="form-group">
                                <label for="en_description">Description</label>
                                <textarea class="form-control" id="field-en_description" name="en_description" rows="4"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-1"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="block block-shadow block-bordered block-rounded">
                <div class="block-content bg-body-light p-3">
                    <!-- Search -->
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search_box" placeholder="Masukan Kata Kunci..">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Search -->
                </div>
                <div class="block-content pb-15 pt-3">
                    <table class="table table-hover table-vcenter mb-0" id="list-kategori">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th width="25%">Total</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('js/admin/post/kategori.js') }}"></script>
@endpush
