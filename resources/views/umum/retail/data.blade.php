
@if($data->count() >= 1)
@foreach($data as $d)
<div class="block block-rounded block-bordered block-shadow mb-5">
    <div class="block-content bg-body-light py-10">
        <div class="row">
            <div class="col-lg-9 col-8">
                <strong>{{ $d->name }}</strong>
            </div>
            <div class="col-4 col-lg-3 text-right">
                0 KM
            </div>
        </div>
    </div>
    <div class="block-content py-15">
        <p>{{ $d->address }}</p>
        <a href="#" class="btn btn-outline-primary btn-block">Navigasi</a>
    </div>
</div>
@endforeach

{{-- <div class="row justify-content-center py-10">
    {{ $data->links() }}
</div> --}}
@else
<div class="block block-rounded block-shadow block-bordered">
<div class="block-content">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <img class="img-fluid" src="{{ asset('img/icon/not_found.png') }}">
            <div>
                <h3 class="font-size-24 font-w600 mt-3">Dokumen Tidak Ditemukan!</h3>
            </div>
        </div>
    </div>
</div>
</div>
@endif
