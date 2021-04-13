@extends('umum.layouts.master')

@section('styles')
    
@endsection


@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10">{{ __('front_menu.about_us') }}</h1>
            <h2 class="h4 font-w400 text-muted">{{ __('front_menu.management_greeting') }}</h2>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="bg-white">

    <div class="content">
        <!-- Dummy content -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="block">
                    <div class="block-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{ asset('img/ceo.png') }}" class="img-fluid" />
                            </div>
                            <div class="col-lg-8">
                                <p>
                                    Selama lebih dari 4 dekade, produk-produk PT. Rajawali Hiyoto telah mewarnai
                                    Indonesia mulai
                                    dari hunian, gedung, hingga hasil industri. Berawal dari industry cat, kami terus
                                    berinovasi
                                    dengan perluasan produk perekat dan bahan kimia bangunan.
                                </p>
                                <p>
                                    Dalam perkembangannya PT. Rajawali Hiyoto tidak pernah berhenti berinovasi untuk
                                    menghasilkan
                                    produk-produk berkualitas untuk berbagai lapisan masyarakat di seluruh pelosok tanah
                                    air. Kami
                                    menyadari tantangan yang semakin berat di era globalisasi, namun kami jadikan semua
                                    tantangan
                                    adalah kesempatan untuk berkembang lebih baik.
                                </p>
                                <p>
                                    Tidak hanya kepentingan bisnis, kami juga berkomitmen untuk kontribusi terhadap
                                    lingkungan
                                    sekitar dengan diterapkannya sistem management lingkungan dan digunakannya
                                    bahan-bahan serta
                                    proses produksi yang ramah lingkungan yang telah tesertifikasi oleh Green Label
                                    Singapura.
                                    Sebagai bakti terhadap masyarakat kami mengadakan rangkaian kegiatan CSR secara
                                    berkesinambungan
                                </p>
                                <p>
                                    Semua pencapaian yang kami alami tidak terlepas dari peran serta seluruh stake
                                    holder dan
                                    customer.
                                </p>
                                <p>
                                    Salam,<br>
                                    <br>
                                    <br>
                                    <b>Santo Triharto & Dirman Triharto</b>
                                </p>
                            </div>
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