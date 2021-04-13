@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.10/themes/default/style.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Kategori Produk
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="block">
                <div class="block-content pb-15">
                    <button class="btn btn-primary btn-block add-root-category">Tambah Kategori Induk</button>
                    <button class="btn btn-primary btn-block add-sub-category disabled">Tambah Sub Kategori</button>
                    <div class="mt-10 mb-10">
                        <a href="#" class="collapse-all">Collapse All</a> |
                        <a href="#" class="expand-all">Expand All</a>
                    </div>
                    <div id="kategori-tree"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <form id="form-kategori" onsubmit="return false">
                <input type="hidden" id="metode" value="tambah"/>
                <input type="hidden" id="nama_kategori" value=""/>
                <input type="hidden" id="field-kategori_id" name="kategori_id" value=""/>
                <input type="hidden" id="field-parent_id" name="parent_id" value=""/>
                @csrf
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title" id="form-title">Tambah kategori</h3>
                        <button type="button" class="btn btn-danger float-right mr-5 hide" id="hapus-kategori">
                            <i class="si si-trash mr-1"></i>
                            Hapus
                        </button>
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="si si-paper-plane mr-1"></i>
                            Simpan
                        </button>
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
                        <div class="tab-pane active" id="indonesia-link" role="tabpanel">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="field-title">Judul</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" id="field-title" name="title">
                                    <div class="invalid-feedback" id="error-title">Invalid feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="english-link" role="tabpanel">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="field-en_title">Title</label>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" id="field-en_title" name="en_title">
                                    <div class="invalid-feedback" id="error-en_title">Invalid feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="field-nama">Thumbnail</label>
                            <div class="col-lg-7">
                                <div class="col-6 pl-0">
                                    <img id="thumbPrev" class="border border-2x border-primary img-fluid mb-2" src="{{ asset('img/placeholder/product.png') }}"/>
                                    <input type="hidden" name="thumbnail" value="">
                                    <div class="btn btn-primary btn-block">
                                        <input type="file" class="file-upload" id="uploadThumb" accept="image/*">
                                        <i class="si si-camera mr-1"></i>Pilih Foto
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="cropModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="block-header block-header-default">
                    <h3 class="block-title modal-title">Potong & Sesuaikan Icon</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <div class="block-content pb-15">
                <div id="resizer"></div>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-alt-primary rotate btn-block text-center" data-deg="90">
                            <i class="fa fa-undo"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-alt-primary rotate btn-block text-center" data-deg="-90" >
                        <i class="fa fa-redo"></i></button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-alt-primary btn-block" id="upload">Potong Dan Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.10/jstree.min.js"></script>
<script src="{{ asset('js/admin/product/category.js') }}"></script>
@endpush
