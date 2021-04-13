
var roleSelect, oTable;
jQuery(function() {
    oTable = $('#list-data');
    oTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: laroute.route('admin.user'),
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'role',
                name: 'role'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        pagingType : "simple",
        oLanguage: {
            sSearch: '<i class="fa fa-search"></i>',
            sSearchPlaceholder: 'Pencarian..',
            oPaginate: {
                sNext: '<i class="fa fa-chevron-right" ></i>',
                sPrevious: '<i class="fa fa-chevron-left" ></i>'
            }
        },
        // sDom :   "<'row'<'col-6'<'row'<'col-6'f>><'col-6'p>>",
        sDom : "<'row'<'col-lg-7'<'row'<'col-lg-6'f<'col-lg-6'>>>>"+
        "<'col-lg-5'<'row'<'col-9 m-auto'i><'col-3'p>>>",
        drawCallback: function () {
            
            $('#list-data_wrapper .top').addClass('px-2');
            $("#list-data").addClass('my-0');
            // Search Filter
            $('#list-data_filter input').addClass('ml-0');
            $('#list-data_filter').addClass('text-left mt-2 mx-2');
            $('#list-data_filter label').addClass("has-search mb-0 w-100");
            // Search Pagination
            $('#list-data_paginate').addClass("mt-2 mx-2");
            $('#list-data_paginate ul.pagination').addClass("pagination-md mb-0");
            $('#list-data_paginate ul.pagination li').addClass("mx-1");
            $('#list-data_paginate ul.pagination li a').addClass("page-link");
            $("input.form-control").removeClass('form-control-sm');
            
        }
    });

    $(".input-password a").on('click', function(event) {
        event.preventDefault();
        if($('.input-password input').attr("type") == "text"){
            $('.input-password input').attr('type', 'password');
            $('.input-password i').addClass( "fa-eye-slash" );
            $('.input-password i').removeClass( "fa-eye" );
        }else if($('.input-password input').attr("type") == "password"){
            $('.input-password input').attr('type', 'text');
            $('.input-password i').removeClass( "fa-eye-slash" );
            $('.input-password i').addClass( "fa-eye" );
        }
    });

    roleSelect = $("#field-role").select2({
        allowClear: true,
        theme : 'bootstrap4',
        ajax: {
            url: laroute.route('admin.userRole.json'),
            type: 'POST',
            dataType: 'JSON',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    }).on('select2:unselecting', function(e) {
        $(this).val(null).trigger('change');
        e.preventDefault();
    });

    $("#form-user").on("submit",function (e) {
        e.preventDefault();
        var fomr = $('form#form-user')[0];
        var formData = new FormData(fomr);

        $.ajax({
            url: laroute.route('admin.user.save'),
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: 'Data Sedang Diproses!',
                    imageUrl: laroute.url('public/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function (response) {
                Swal.close();
                $('.is-invalid').removeClass('is-invalid');
                if (response.fail == false) {
                    $('#modal_embed').modal('hide');
                    Swal.fire({
                        title: `Berhasil!`,
                        showConfirmButton: false,
                        icon: 'success',
                        html: `Pengguna Baru Berhasil Disimpan!
                            <br><br>
                            <a href="`+ laroute.route('admin.user') +`" class="btn btn-alt-danger">
                                <i class="si si-close mr-1"></i>Keluar
                            </a> 
                            <a href="`+ laroute.route('admin.user.tambah') +`" class="btn btn-alt-primary">
                                <i class="si si-plus mr-1"></i>Tambah Pengguna Lain
                            </a>`,
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                } else {
                    Swal.close();
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                        $.notify({
                            // options
                            icon: 'fa fa-times',
                            message: response.errors[control]
                        },{
                            // settings
                            delay: 7000,
                            type: 'danger'
                        });
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error adding / update data');
            }
        });
    });
});