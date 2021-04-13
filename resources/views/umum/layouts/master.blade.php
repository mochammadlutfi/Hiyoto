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
        class="sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">

        <!-- Sidebar -->
        <nav id="sidebar">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow bg-black-op-10">
                    <div class="content-header-section text-center align-parent">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="link-effect font-w700" href="index.html">
                                <i class="si si-fire text-primary"></i>
                                <span class="font-size-xl text-dual-primary-dark">code</span><span
                                    class="font-size-xl text-primary">base</span>
                            </a>
                        </div>
                        <!-- END Logo -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Main Navigation -->
                <div class="content-side content-side-full">
                    <!--
                        Mobile navigation, desktop navigation can be found in #page-header

                        If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
                        -->
                    <ul class="nav-main">
                        <li>
                            <a href="bd_dashboard.html"><i class="si si-compass"></i>Dashboard</a>
                        </li>
                        <li class="nav-main-heading">Layout</li>
                        <li class="open">
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                    class="si si-puzzle"></i>Variations</a>
                            <ul>
                                <li>
                                    <a href="bd_variations_hero_simple_1.html">Hero Simple 1</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_simple_2.html">Hero Simple 2</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_simple_3.html">Hero Simple 3</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_simple_4.html">Hero Simple 4</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_image_1.html">Hero Image 1</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_image_2.html">Hero Image 2</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_image_3.html">Hero Image 3</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_image_4.html">Hero Image 4</a>
                                </li>
                                <li>
                                    <a href="bd_variations_hero_video_1.html">Hero Video 1</a>
                                </li>
                                <li>
                                    <a class="active" href="bd_variations_hero_video_2.html">Hero Video 2</a>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">More Options</a>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">Another Link</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Another Link</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Another Link</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-heading">Other Pages</li>
                        <li>
                            <a href="bd_search.html"><i class="si si-magnifier"></i>Search</a>
                        </li>
                        <li>
                            <a href="be_pages_dashboard.html"><i class="si si-action-undo"></i>Go Back</a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Main Navigation -->
            </div>
            <!-- Sidebar Content -->
        </nav>
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
