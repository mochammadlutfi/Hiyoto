@extends('umum.layouts.master')

@section('styles')
    
@endsection


@section('content')
<!-- Hero -->
{{-- <div class="bg-image" style="background-image: url('assets/media/photos/photo27@2x.jpg');"> --}}
    <div class="bg-body-light">
        <div class="content text-center">
            <div class="pt-50 pb-20">
                <h1 class="font-w700 mb-10">{{ __('front_menu.about_us') }}</h1>
                <h2 class="h4 font-w400 text-muted">{{ __('front_menu.our_value') }}</h2>
            </div>
        </div>
    </div>
{{-- </div> --}}
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white"> 
    <div class="content content-full">
        <!-- Dummy content -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <img src="{{ asset('img/hero/nilai.jpg') }}" class="img-fluid rounded"/>
                <p class="font-size-24 text-center my-lg-3">Dengan semangat <b>CIPTA</b>, PT Rajawali Hiyoto terus berinovasi dan
                    berkarya demi mencapai kebahagiaan bersama</p>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="block border-bottom border-2x border-primary">
                    <div class="block-content">
                        <div class="text-center">
                            <img src="{{ asset('img/icon/customer.png') }}"/>
                            <h3 class="font-size-h4">Customer Oriented</h3>
                            <p>Menjadi partner yang mampu memahami dan memenuhi keinginan pelanggan dengan menghasilkan kualitas kerja yang melebihi harapan pelanggan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="block border-bottom border-2x border-primary">
                    <div class="block-content">
                        <div class="text-center">
                            <img src="{{ asset('img/icon/integrity.png') }}"/>
                            <h3 class="font-size-h4">Integrity</h3>
                            <p>Menjadi  pribadi yang menjunjung tinggi nilai kejujuran, penuh rasa tanggung jawab dan loyal pada perusahaan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="block border-bottom border-2x border-primary">
                    <div class="block-content">
                        <div class="text-center">
                            <img src="{{ asset('img/icon/growth.png') }}"/>
                            <h3 class="font-size-h4">Passion for Growth</h3>
                            <p>Memiliki hasrat yang melekat di dalam jiwa untuk selalu mengembangkan diri dengan berpikiran terbuka, antusias, dan adaptif pada perubahan.                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="block border-bottom border-2x border-primary">
                    <div class="block-content">
                        <div class="text-center">
                            <img src="{{ asset('img/icon/teamwork.png') }}"/>
                            <h3 class="font-size-h4">Teamwork</h3>
                            <p>Memiliki hasrat yang melekat di dalam jiwa untuk selalu mengembangkan diri dengan berpikiran terbuka, antusias, dan adaptif pada perubahan.                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="block border-bottom border-2x border-primary">
                    <div class="block-content">
                        <div class="text-center">
                            <img src="{{ asset('img/icon/agile.png') }}"/>
                            <h3 class="font-size-h4">Agile</h3>
                            <p>Pribadi yang mampu bergerak dan berpikir cepat, cekatan dalam bertindak serta tangguh
                                dalam menghadapi berbagai tantangan dalam pekerjaannya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Dummy content -->
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
    
@endpush