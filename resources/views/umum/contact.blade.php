@extends('umum.layouts.master')

@section('styles')
    
@endsection


@section('content')
<!-- Hero -->
<div class="bg-image mt-lg-4" style="background-image: url({{ asset('img/hero/karir.jpg') }});">
    <div class="bg-black-op-75">
        <div class="content text-center">
            <div class="pb-lg-10 pt-lg-8">
                <h1 class="font-w700 mb-10 text-white">{{ __('front_menu.contact_us') }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="block block-bordered block-shadow block-rounded mt-lg-n9">
                    <div class="block-content block-content-full">
                        <form id="form-contact" method="POST" onsubmit="return false;">
                            @csrf
                            <input type="hidden" name="lang" value="{{ LaravelLocalization::getCurrentLocale()}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="field-name">{{ __('contact.frm_name') }}</label>
                                        <input class="form-control" type="text" name="name" id="field-name">
                                        <div class="invalid-feedback" id="error-name">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="field-email">{{ __('contact.frm_email')  }}</label>
                                        <input class="form-control" type="text" name="email" id="field-email">
                                        <div class="invalid-feedback" id="error-email">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="field-phone">{{ __('contact.frm_tel')  }}</label>
                                        <input class="form-control" type="text" name="phone" id="field-phone">
                                        <div class="invalid-feedback" id="error-phone">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="field-category">{{ __('contact.frm_category') }}</label>
                                        <select class="form-control" name="category" id="field-category">
                                            <option value="">Pilih</option>
                                            <option value="Produk">Produk</option>
                                            <option value="Kerjasama">Kerjasama</option>
                                            <option value="Lowongan Kerja">Lowongan Kerja</option>
                                            <option value="Kritik & Saran">Kritik & Saran</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-category">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="field-profession">{{ __('contact.frm_profesi') }}</label>
                                        <select class="form-control" name="profession" id="field-profession">
                                            <option value="">Pilih</option>
                                            <option value="Arsitek">Arsitek</option>
                                            <option value="Interior Designer">Interior Designer</option>
                                            <option value="Kontraktor">Kontraktor</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <div class="invalid-feedback" id="error-profession">Invalid feedback</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="field-subject">{{ __('contact.frm_subject') }}</label>
                                        <input class="form-control" type="text" name="subject" id="field-subject">
                                        <div class="invalid-feedback" id="error-subject">Invalid feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-description">Deskripsi</label>
                                <textarea name="description" class="form-control" id="field-description" rows="6"></textarea>
                                <div class="invalid-feedback" id="error-description">Invalid feedback</div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block">
                                <i class="si si-paper-plane mr-3"></i>
                                Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
<script src="{{ asset('js/umum/contact.js') }}"></script>
@endpush