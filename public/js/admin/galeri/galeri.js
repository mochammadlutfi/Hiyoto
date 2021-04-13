jQuery(document).ready(function () {
    load_content();
    var modal = $('#modalAlbum');

    // Crop Start
    var croppie = null;
    var cropModal = $("#cropModal");
    var el = document.getElementById('resizer');
    var formData = new FormData();

    $.base64ImageToBlob = function(str) {
        var pos = str.indexOf(';base64,');
        var type = str.substring(5, pos);
        var b64 = str.substr(pos + 8);
        var imageContent = atob(b64);
        var buffer = new ArrayBuffer(imageContent.length);
        var view = new Uint8Array(buffer);
        for (var n = 0; n < imageContent.length; n++) {
          view[n] = imageContent.charCodeAt(n);
        }
        var blob = new Blob([buffer], { type: type });
        return blob;
    }

    $.getImage = function(input, croppie) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                croppie.bind({
                    url: e.target.result,
                });
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-upload").on("change", function(event) {
        cropModal.modal();
        croppie = new Croppie(el, {
            viewport: {
                width: 440,
                height: 240,
                type: 'square'
            },
            original : {
                width: 440,
                height: 240,
                type: 'square'
            },
            boundary: {
                width: 460,
                height: 260
            },
            enableOrientation: true
        });
        $.getImage(event.target, croppie);
    });

    $("#upload").on("click", function() {
        croppie.result({
            type: 'base64',
            size: 'original',
			format:'jpeg',
			size: { 
                width: 1200, height: 675 
            }
        }).then(function(base64) {
            cropModal.modal("hide");
            $("#img_preview").attr("src", base64);
            $("#featured_img").val(base64);
        });
    });

    $(".rotate").on("click", function() {
        croppie.rotate(parseInt($(this).data('deg')));
    });

    cropModal.on('hidden.bs.modal', function (e) {
        setTimeout(function() { 
            croppie.destroy(); 
        }, 100);
    });
    

    $(document).on('click', '#btn_tambah', function () {
        $('#form-album')[0].reset();
        modal.find('input#metode').val('tambah');
        $('#modal_title').text('Tambah Album Baru');
        modal.modal({
            backdrop: 'static',
            keyboard: false
        })
    });

    $("#form-album").validate({
        onfocusout: function(element) {
            $(element).valid()
            if ($(element).valid()) {
                $('#form-album').find('button:submit').prop('disabled', false);  
            } else {
                $('#form-album').find('button:submit').prop('disabled', 'disabled');
            }
        },    
        errorClass: "invalid-feedback font-size-sm animated fadeInDown",
        errorElement: "div",
        errorPlacement: function (e, n) {
            jQuery(n).parents(".form-group").find('div.invalid-feedback').html(e);
        },
        highlight: function (e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid");
        },
        success: function (e) {
            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid");
            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
        },
        rules: {
            nama: {
                required: true,
            },
            
        },
        messages: {
            nama: {
                required: "Nama Album Wajib Diisi!",
            },
        },
        submitHandler: function (form) {
            var fomr = $('form#form-album')[0];
            var formData = new FormData(fomr);
            if($('#metode').val() == 'tambah')
            {
                url = laroute.route('admin.galeri.simpan');
            }else{
                url = laroute.route('admin.galeri.update');
            }
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    Swal.fire({
                        title: 'Tunggu Sebentar...',
                        text: '',
                        imageUrl: laroute.url('assets/img/loading.gif', ['']),
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                },
                success: function (response) {
                    if (response.fail == false) {
                        Swal.fire({
                            title: `Berhasil!`,
                            showConfirmButton: false,
                            icon: 'success',
                            html: `Galeri Foto Berhasil Disimpan!
                                <br><br>
                                <a href="`+ laroute.route('admin.post') +`" class="btn btn-keluar btn-alt-danger">
                                    <i class="si si-close mr-1"></i>Keluar
                                </a> 
                                <a href="`+ laroute.route('admin.post.tambah') +`" class="btn btn-tambah_baru btn-alt-primary">
                                    <i class="si si-plus mr-1"></i>Tambahkan Foto
                                </a>`,
                            showCancelButton: false,
                            showConfirmButton: false,
                            onBeforeOpen: () => {
                                const keluar = document.querySelector('.btn-keluar')
                                const tambah_baru = document.querySelector('.btn-tambah_baru')
                    
                                keluar.addEventListener('click', () => {
                                        location.href = laroute.route('admin.posts');
                                })
                    
                                tambah_baru.addEventListener('click', () => {
                                        location.reload();
                                })
                            }
                        });
                        $('.form-group').removeClass('is-invalid');
                        $('.form-group').removeClass('is-valid');
                        load_content();
                        modal.modal('toggle');
                    } else {
                        Swal.fire({
                            title: "Gagal",
                            text: "Periksa Form Input!",
                            timer: 3000,
                            showConfirmButton: false,
                            icon: 'error'
                        });
                        for (control in response.errors) {
                            $('#field-' + control).addClass('is-invalid');
                            $('#error-' + control).html(response.errors[control]);
                        }
                    }
                }
            });
            return false;
        }
    });

    $(document).on('click', '.btn-edit', function () { 
        var id = $(this).attr('data-id');
        $.ajax({
            url: laroute.route('admin.galeri.edit', { id: id }),
            type: "GET",
            dataType: "JSON",
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: ' ',
                    imageUrl: laroute.url('assets/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function(data) {
                Swal.close();
                $('#form-album')[0].reset();
                $('.form-group').removeClass('is-valid');
                $('.form-group').removeClass('is-invalid');
                modal.modal({
                    backdrop: 'static',
                    keyboard: false
                });

                // modal.find('h5.modal-title').html('Ubah Alamat');
                modal.find('input#field-id').val(data.id);
                modal.find('input#metode').val('update');
                modal.find('input#field-nama').val(data.nama);
                modal.find('textarea#field-deskripsi').val(data.deskripsi);
                modal.find('img#img_preview').attr("src", laroute.url(data.foto, ['']));
                if(data.status === '1')
                {
                    modal.find('#status_publikasi').prop("checked", true);
                }else{
                    modal.find('#status_draft').prop("checked", true);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error deleting data');
            }
        });
    });
    
    $(document).on('click', '.btn-hapus', function () { 
        id = $(this).attr('data-id');
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
                url: laroute.route('admin.pengguna.hapus', { id: id }),
                type: "GET",
                dataType: "JSON",
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
                        text: 'Pengguna Berhasil Dihapus!',
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
                window.setTimeout(function(){
                    location.reload();
                } ,1500);
            }
        });
    });

    $(document).on('click', 'button#nextProduk', function() {     
        current_page = parseInt($('#current_page').val());
        current_page += 1;
        load_content(null, current_page);
    });
    
    // Navigasi Prev Page Modal Produk
    $(document).on('click', 'button#prevProduk', function() {
        current_page = parseInt($('#current_page').val());
        current_page -= 1;
        load_content(null, current_page);
    });

    $(document).on('click', '.btn-hapus', function () { 
        id = $(this).attr('data-id');
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
                url: laroute.route('admin.galeri.hapus', { id: id }),
                type: "GET",
                dataType: "JSON",
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
                        text: 'pengelola Berhasil Dihapus!',
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                    $('#list-pengelola').DataTable().ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
            } else {
                window.setTimeout(function(){
                    location.reload();
                } ,1500);
            }
        });
    });

});

function load_content(keyword, page = 1)
{
    $.ajax({
        url: laroute.route('admin.galeri'),
        type: "GET",
        dataType: "JSON",
        data: {
            keyword: keyword,
            page: page,
        },
        beforeSend: function(){
            $('#album-list tbody').html(`
            <tr>
                <td colspan="5">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center py-50">
                            <div class="spinner-border text-primary wh-50" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>`);
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
            }
            $('#content-nav span').html(response.navigasi);
            $('#album-list tbody').html(response.html);
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
            url: laroute.route('admin.galeri.hapus', { id: id }),
            type: "GET",
            dataType: "JSON",
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: ' ',
                    imageUrl: laroute.url('assets/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function(response) {
                if(response.fail === true)
                {
                    Swal.fire({
                        title: "Berhasil",
                        text: 'Galeri Berhasil Dihapus!',
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                    $('#list-album').DataTable().ajax.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error deleting data');
            }
        });
        }else{
            Swal.close();
        }
    });
}