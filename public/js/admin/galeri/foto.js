$(document).ready(function () {
    load_content();
    var modal = $('#modal_form');

    jQuery(".js-gal:not(.js-gal-enabled)").each(function (e, t) {
        jQuery(t)
            .addClass("js-gal-enabled")
            .magnificPopup({
                delegate: "a.img-lightbox",
                type: "image",
                gallery: {
                    enabled: !0
                }
            });
    });

    $(document).on('click', '#btn_tambah', function () {
        save_method = 'tambah';
        $('#modal_form').modal({
            backdrop: 'static',
            keyboard: false
        });
       $("#upload-foto").fileinput('refresh');
    });

    $("#upload-foto").fileinput({
        theme: 'fa',
        language: 'id',
    });

    $("#form-foto").submit(function (e) {
        e.preventDefault();
        var fomr = $('form#form-foto')[0];
        var formData = new FormData(fomr);
        $.ajax({
            url: laroute.route('admin.galeri.upload'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: 'Data Sedang Diproses!',
                    imageUrl: laroute.url('assets/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function (response) {
                Swal.close();
                $('.is-invalid').removeClass('is-invalid');
                if (response.fail == false) {
                    modal.modal('hide');
                    Swal.fire({
                        title: "Berhasil",
                        text: response.pesan,
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                } else {
                    Swal.fire({
                        title: "Gagal",
                        text: "Foto Gagal Di Upload!",
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'error'
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error adding / update data');
            }
        });
    });

    $(window).scroll(function() {
        if($(window).scrollTop() == $(document).height() - $(window).height()) {
            current_page = parseInt($('#current_page').val());
            current_page += 1;
            $('#current_page').val(current_page);
            load_content(null, current_page);
        }
    });
});

function load_content(keyword, page = 1)
{
    $.ajax({
        url: $(location).attr("href"),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            page: page,
        },
        beforeSend: function(){
            $('#loadingContent').removeClass('d-none');
        },
        success: function(response) {
            $('#loadingContent').addClass('d-none');
            if(response.total !== 0)
            {
                $('#empty').addClass('d-none');
                if(page === 1)
                {
                    $('#masonry').html(response.html);
                    $('#masonry').prepend('<div class="col-lg-4 grid-sizer"></div>');
                    $('#current_page').val(1);
                }else{
                    $('#masonry').append(response.html);
                }
                
               $('.gallery-wrapper').masonry({
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-sizer',
                    percentPosition: true,
                    transitionDuration: 0,
                });
            }else{
                $('#empty').removeClass('d-none');
            }
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error deleting data');
        }
    });
}

function hapus(id) {
    
    Swal.fire({
        title: "Anda Yakin?",
        text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak, Batalkan!',
        reverseButtons: true,
        allowOutsideClick: false,
        confirmButtonColor: '#af1310',
        cancelButtonColor: '#fffff',
    })
    .then((result) => {
        if (result.value) {
        $.ajax({
            data: {
                id: id,
            },
            type: "POST",
            url: laroute.route('admin.galeri.foto_hapus'),
            cache: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: ' ',
                    imageUrl: laroute.url('assets/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function() {
                Swal.fire({
                    title: "Berhasil",
                    text: 'Foto Berhasil Dihapus!',
                    timer: 3000,
                    showConfirmButton: false,
                    icon: 'success'
                });
                load_content();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
            }
        });
        } else {
            Swal.close();
        }
    });
}