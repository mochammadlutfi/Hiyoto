@extends('umum.layouts.master')

@section('styles')
    
@endsection


@section('content')
<!-- Hero -->
<div class="bg-image mt-lg-4" style="background-image: url({{ asset('img/hero/karir.jpg') }});">
    <div class="bg-black-op-75">
        <div class="content text-center">
            <div class="py-150 pb-20">
                <h1 class="font-w700 mb-10 text-white">{{ __('front_menu.career.title') }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center  text-center">
            <div class="col-12 col-lg-10">
                <h2 class="font-size-h3">Kami mencari kandidat terbaik untuk bergabung dengan tim super kami,
                    bersama kita membangun dan mengembangkan perusahaan.</h2>
                <p class="font-size-20">Kirim surat lamaran dan CV Anda ke <a href="mailto:recruitment.hiyoto@gmail.com">recruitment.hiyoto@gmail.com</a>.<br>
                    Harap sertakan Kode Posisi pada subjek.Kandidat terpilih akan segera dihubungi.</p>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
    
@endpush