@forelse($data as $d)
<tr>
    <td>
        <div class="custom-control custom-checkbox mb-5">
            <input class="custom-control-input" type="checkbox" name="example-checkbox1" id="example-checkbox1" value="option1" >
            <label class="custom-control-label" for="example-checkbox1"></label>
        </div>
    </td>
    <td width="5%">
        <img src="{{ asset($d->image_url) }}" width="40px">
    </td>
    <td>
        <div class="font-size-16 font-w600">
            {{ $d->title }}
        </div>
        <div class="font-size-15">
            {{ $d->category->title }} |
            @if($d->status == 1)
                <span class="badge badge-success">Publikasi</span>
            @else
                <span class="badge badge-danger">Draft</span>
            @endif
        </div>
    </td>
    <td>
        {{ $d->views }}x
    </td>
    <td>
        {{ $d->dibuat }}
    </td>
    <td>
        <div class="btn-group text-center" role="group">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="si si-wrench mr-1"></i>Aksi</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                <a class="dropdown-item" href="{{ route('admin.product.edit', $d->id) }}">
                    <i class="si si-note mr-5"></i>Ubah Produk
                </a>
                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus({{ $d->id}})">
                    <i class="si si-trash mr-5"></i>Hapus Produk
                </a>
            </div>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5">
        <div class="text-center">
            <img class="img-fluid" src="{{ asset('assets/img/icon/not_found.png') }}">
            <div>
                <h3 class="font-size-24 font-w600 mt-3">Data Tidak Ditemukan</h3>
            </div>
        </div>
    </td>
</tr>
@endforelse
