<!doctype html>
<html lang="en" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    @include('umum.layouts.meta')
    <!-- Stylesheets -->
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/app.css')}}">
    {{-- <link rel="stylesheet" id="css-main" href="{{ asset('css/style.css')}}"> --}}
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
    @yield('styles')
</head>

<body>
    <div id="page-loader" class="show"></div>
    <div id="page-container"
        class="side-scroll page-header-fixed page-header-inverse main-content-boxed">

        <!-- Sidebar -->
        @include('umum.layouts.sidebar')
        <!-- END Sidebar -->

        <!-- Header -->
        @include('umum.layouts.header')
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('umum.layouts.footer')
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
    <script src="{{ asset('js/laravel.app.js') }}"></script>
    <script src="{{ asset('js/laroute.js') }}"></script>
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script> --}}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const observer = lozad('.lozad', {
            rootMargin: '10px 0px', // syntax similar to that of CSS Margin
            threshold: 0.1 // ratio of element convergence
        });
        observer.observe();
    </script>
    @stack('scripts')

</body>

</html>
