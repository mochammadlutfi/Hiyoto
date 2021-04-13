jQuery(function() {

    load_content();
});
// $(document).ready(function($) {
//     $(".table-row").on('click', function() {
//         alert('sad');
//         // window.document.location = $(this).data("href");
//     });
// });

function detail(id){
    
    window.document.location = laroute.route('admin.contact.detail', { id: id });
}

function load_content(page = 1)
{

    var kategori = $('#kategori').val();
    var keyword = $('#keyword').val();
    
    $.ajax({
        url: laroute.route('admin.contact'),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            kategori_id : kategori,
            page: page,
        },
        beforeSend: function(){
            $('#data-list tbody tr#loading').removeClass('d-none');
        },
        success: function(response) {
            if(!response.next_page)
            {
                $('#nextProduk').prop('disabled', true);
            }else{
                $('#nextProduk').prop('disabled', false);
            }
            if(!response.prev_page)
            {
                $('#prevProduk').prop('disabled', true);
            }else{
                $('#prevProduk').prop('disabled', false);
            }if(response.current_page == 1)
            {
                $('#dataContent').html('');
                $('#btn-loadMore').removeClass('d-none');
            } 

            if(response.data.length !== 0)
            {
                var i = 0;
                $.each(response.data, function(k, v) {
                    $('#data-list tbody').append(`
                    <tr class="c-pointer" onclick="detail(`+ response.data[k].id +`)">
                        <td width="3%">
                            <div class="custom-control custom-checkbox mb-5">
                                <input class="custom-control-input" type="checkbox" name="example-checkbox1" id="example-checkbox1" value="option1" >
                                <label class="custom-control-label" for="example-checkbox1"></label>
                            </div>
                        </td>
                        <td width="15%">
                            <div class="font-size-16 font-w600">`+ response.data[k].name +`</div>
                            <div class="font-size-15">` + response.data[k].profession +`</div>
                        </td>
                        <td width="20%">
                            <div class="font-size-16 font-w600">` + response.data[k].email +`</div>
                            <div class="font-size-15">` + response.data[k].phone +`</div>
                        </td>
                        <td>` + response.data[k].category +`</td>
                        <td>` + response.data[k].subject +`</td>
                        <td width="5%">
                            <div class="btn-group text-center" role="group">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="si si-wrench mr-1"></i>Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                    <a class="dropdown-item" href="{{ route('admin.post.edit', $post->id) }}">
                                        <i class="si si-note mr-5"></i>Ubah Berita
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0)" onClick="hapus({{ $post->id}})">
                                        <i class="si si-trash mr-5"></i>Hapus Berita
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>                    
                    `);
                });
                $('#data-list tbody tr#loading').addClass('d-none');
            }else{
                $('#btn-loadMore').addClass('d-none');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
        }
    });
}
