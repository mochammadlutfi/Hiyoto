@extends('umum.layouts.master')

@section('styles')
<style>
.job-title {
    transition: opacity 0.2s ease-out;
    margin: 0 auto;
    width: 100%;
    overflow-x: visible;
    padding : 0.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70px;
}

.job-info {
    transition: opacity 0.2s ease-out;
    margin: 0 auto;
    width: 100%;
    overflow-x: visible;
    padding : 0.8rem;
}

.job-info p {
    height: 45px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: pre-wrap;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

</style>
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
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-10">
                <h2 class="font-size-h3">{{ __('career.intro') }}</h2>
                <p class="font-size-20">{!! __('career.sub_intro') !!}</p>
            </div>
        </div>
        <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
            <li class="nav-item flex-sm-fill">
              <a id="pusat-tab" data-toggle="tab" href="#pusat" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">{{ __('career.pusat') }}</a>
            </li>
            <li class="nav-item flex-sm-fill">
              <a id="cabang-tab" data-toggle="tab" href="#cabang" role="tab" aria-controls="cabang" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">{{ __('career.cabang') }}</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div id="pusat" role="tabpanel" aria-labelledby="pusat-tab" class="tab-pane fade px-2 py-lg-4 show active">
              <div class="row justify-content-center">
                  @foreach($data->pusat as $d)
                    <div class="col-4 d-flex align-items-stretch px-2">
                        <div class="block block-shadow block-rounded block-bordered w-100 job">
                            <div class="job-title">
                                <h2 class="font-size-h5 mb-0 py-lg-2 text-center">
                                    {{ $d->jabatan }}
                                </h2>
                            </div>
                            <hr class="border-3x my-0"/>
                            <div class="job-info py-10">
                                <p class="mb-0">{{ $d->info }}</p>
                                <div class="row">
                                    <label class="col-6 col-lg-4 mb-0 text-black font-size-14-down-lg pr-0">{{ __('career.lokasi') }}</label>
                                    <div class="col-6 col-lg-8">
                                        <div class="form-control-plaintext text-left py-0 font-size-14-down-lg ">
                                            : {{ $d->lokasi }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-6 col-lg-4 mb-0 text-black font-size-14-down-lg  pr-0">{{ __('career.tgl_mulai') }}</label>
                                    <div class="col-6 col-lg-8">
                                        <div class="form-control-plaintext text-left py-0 font-size-14-down-lg ">
                                            : {{ $d->mulai_lowongan }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-6 col-lg-4 mb-0 text-black font-size-14-down-lg pr-0">{{ __('career.tgl_selesai') }}</label>
                                    <div class="col-6 col-lg-8">
                                        <div class="form-control-plaintext text-left py-0 font-size-14-down-lg ">
                                            : {{ $d->selesai_lowongan }}
                                        </div>
                                    </div>
                                </div>
                                <a href="http://www.hiyoto.com/career/applicant/job/detail/{{ $d->id_lowongan }}" class="btn btn-primary btn-block mt-3" target="_blank">{{ __('career.detail_btn') }}</a>
                            </div>
                        </div>
                    </div>
                  @endforeach
              </div>
            </div>
            <div id="cabang" role="tabpanel" aria-labelledby="cabang-tab" class="tab-pane fade px-2 py-lg-4">
              
                <div class="row justify-content-center">
                    @foreach($data->cabang as $d)
                      <div class="col-4 d-flex align-items-stretch px-2">
                          <div class="block block-shadow block-rounded block-bordered w-100 job">
                              <div class="job-title">
                                  <h2 class="font-size-h5 mb-0 py-lg-2 text-center">
                                      {{ $d->jabatan }}
                                  </h2>
                              </div>
                              <hr class="border-3x my-0"/>
                              <div class="job-info py-10">
                                  <p class="mb-0">{{ $d->info }}</p>
                                  <div class="row">
                                      <label class="col-6 col-lg-4 mb-0 text-black font-size-14-down-lg pr-0">{{ __('career.lokasi') }}</label>
                                      <div class="col-6 col-lg-8">
                                          <div class="form-control-plaintext text-left py-0 font-size-14-down-lg ">
                                              : {{ $d->lokasi }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <label class="col-6 col-lg-4 mb-0 text-black font-size-14-down-lg  pr-0">{{ __('career.tgl_mulai') }}</label>
                                      <div class="col-6 col-lg-8">
                                          <div class="form-control-plaintext text-left py-0 font-size-14-down-lg ">
                                              : {{ $d->mulai_lowongan }}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <label class="col-6 col-lg-4 mb-0 text-black font-size-14-down-lg pr-0">{{ __('career.tgl_selesai') }}</label>
                                      <div class="col-6 col-lg-8">
                                          <div class="form-control-plaintext text-left py-0 font-size-14-down-lg ">
                                              : {{ $d->selesai_lowongan }}
                                          </div>
                                      </div>
                                  </div>
                                  <a href="http://www.hiyoto.com/career/applicant/job/detail/{{ $d->id_lowongan }}" class="btn btn-primary btn-block mt-3" target="_blank">{{ __('career.detail_btn') }}</a>
                              </div>
                          </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <div class="row">
            @foreach($data->)
        </div> --}}
    </div>
</div>
<!-- END Page Content -->
@stop

@push('scripts')
    
@endpush