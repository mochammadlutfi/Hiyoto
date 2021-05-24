
        <nav id="sidebar">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow bg-primary">
                    <div class="content-header-section text-center align-parent">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-white"></i>
                        </button>
                        <!-- END Close Sidebar -->

                        <!-- Logo -->
                        <div class="content-header-item">
                            <a class="mr-5" href="{{ url('/') }}">
                                <img src="{{ asset('img/logo/logo_ver.png') }}" class="img-fluid h-100" alt="" srcset="">
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
                        @include('umum.layouts.menu')
                    </ul>
                </div>
                <!-- END Side Main Navigation -->
            </div>
            <!-- Sidebar Content -->
        </nav>