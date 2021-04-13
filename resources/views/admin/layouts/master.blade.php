<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.layouts.meta')

        
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
        <!-- END Stylesheets -->
        @yield('styles')
    </head>
    <body>
        {{-- <div id="page-loader" class="show"></div> --}}

        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header main-content-boxed">

            @include('admin.layouts.sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('admin.layouts.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                @yield('content')
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-left">
                        <a class="font-w600" href="" target="_blank">Rajawali Hiyoyo PT.</a> &copy; <span class="js-year-copy">2021</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        {{-- <script src="{{ asset('js/codebase.app.js') }}"></script> --}}
        <script src="{{ asset('js/laravel.app.js') }}"></script>
        <script src="{{ asset('js/laroute.js') }}"></script>
        <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.extend( true, $.fn.dataTable.defaults, {
            "responsive": true,
            "pageLength": 20,
            "lengthChange": false,
            "language": {
                'loadingRecords': '&nbsp;',
                "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing":   '<div class="spinner-grow text-primary pt-25" role="status"><span class="sr-only">Loading...</span></div>',
                "sLengthMenu":   "Tampilkan _MENU_",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ - _END_ dari _TOTAL_",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
            },
        });
        </script>
        <!-- Laravel Scaffolding JS -->
        @stack('scripts')
    </body>
</html>
