@extends('admin.layouts.master')

@section('styles')
@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Kelola Galeri Video
        <a href="{{ route('admin.video.tambah') }}" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
            <i class="si si-plus mr-5"></i>
            Tambah Video Baru
        </a>
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
            <table class="table table-striped table-vcenter mb-0" id="video-list">
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
@stop
@push('scripts')
<script src="{{ asset('assets/js/admin/video/video.js') }}"></script>
@endpush
