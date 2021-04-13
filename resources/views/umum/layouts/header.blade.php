<header id="page-header">
    <div class="bg-body-light d-none d-lg-block">
        <div class="content-header h-100 py-0">
            <div class="content-header-section w-100">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <a lang="en-US" hreflang="en-US" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHzSURBVHjaYkxOP8IAB//+Mfz7w8Dwi4HhP5CcJb/n/7evb16/APL/gRFQDiAAw3JuAgAIBEDQ/iswEERjGzBQLEru97ll0g0+3HvqMn1SpqlqGsZMsZsIe0SICA5gt5a/AGIEarCPtFh+6N/ffwxA9OvP/7//QYwff/6fZahmePeB4dNHhi+fGb59Y4zyvHHmCEAAAW3YDzQYaJJ93a+vX79aVf58//69fvEPlpIfnz59+vDhw7t37968efP3b/SXL59OnjwIEEAsDP+YgY53b2b89++/awvLn98MDi2cVxl+/vl6mituCtBghi9f/v/48e/XL86krj9XzwEEEENy8g6gu22rfn78+NGs5Ofr16+ZC58+fvyYwX8rxOxXr169fPny+fPn1//93bJlBUAAsQADZMEBxj9/GBxb2P/9+S/R8u3vzxuyaX8ZHv3j8/YGms3w8ycQARmi2eE37t4ACCDGR4/uSkrKAS35B3TT////wADOgLOBIaXIyjBlwxKAAGKRXjCB0SOEaeu+/y9fMnz4AHQxCP348R/o+l+//sMZQBNLEvif3AcIIMZbty7Ly6t9ZmXl+fXj/38GoHH/UcGfP79//BBiYHjy9+8/oUkNAAHEwt1V/vI/KBY/QSISFqM/GBg+MzB8A6PfYC5EFiDAABqgW776MP0rAAAAAElFTkSuQmCC"
                                title="English" alt="English" width="16" height="11" style="width: 16px; height: 11px;">
                        </a>
                        <a lang="id-ID" hreflang="id-ID" href="{{ LaravelLocalization::getLocalizedURL('id', null, [], true) }}"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAFASURBVHjaYrwvyMzw6S8DGPwD0//ACAj+wNj/kNgAAcTC8P6vUF87UPr/v38M//79//v3/18g+Yfh35//v//++/vn/x8g+v3/N4hxe9YigABiYWAGG/biOQNI6V+wNBj9/f0PqOj3738g1b////rFLCUNtAEggFgY/jIAjYSo/gdWygBU8ec3iP37z7/fv0DsXyARxj9AOQaAAGIBOe7b179fPv3/85cBah5Q6a9/v8HafoOM//frF1CckYf3FwMDQACxCOSmctjY//34EeSef2AEchiY8QfsB4jlf/8yCwiKnT8LEECMf/+CguY/EDCAIW7AxMT0/v17gABi+ffvHyMjI0g9Az7VEFmgLwACiAmoAb9SNG0AAQSyAWgXRA8DDADtZEABQC5IFqgYIIBAGn78+PEPAhjAEAeAaAUIMAD/YnbumkL3sQAAAABJRU5ErkJggg=="
                                title="Bahasa Indonesia" alt="Bahasa Indonesia" width="16" height="11"
                                style="width: 16px; height: 11px;">
                            </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('contact') }}" class="font-weight-bold float-right">{{ __('front_menu.contact_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item height-50">
                <a class="mr-5" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo/logo_ver.png') }}" class="img-fluid h-100" alt="" srcset="">
                </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Middle Section -->
        <div class="content-header-section d-none d-lg-block">
            <ul class="nav-main-header">
                <li class="{{ Request::is('about-us/*') ? 'open' : null}}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                        {{ __('front_menu.about_us') }}
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('about.manajemen') }}"> {{ __('front_menu.management_greeting') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.history') }}"> {{ __('front_menu.our_history') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.visimisi') }}"> {{ __('front_menu.vission_mission') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.value') }}"> {{ __('front_menu.our_value') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about.certification') }}"> {{ __('front_menu.certification') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('product/*') ? 'open' : null}}">
                    <a href="{{ route('product') }}">
                        {{ __('front_menu.our_product') }}
                    </a>
                </li>
                <li class="{{ Request::is('reach/*') ? 'open' : null}}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                        {{ __('front_menu.reach') }}
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('branch') }}"> {{ __('front_menu.branch.title') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('store') }}"> {{ __('front_menu.retail.title') }}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('project') }}">
                        {{ __('project.title') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}">
                        {{ __('front_menu.news.title') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('career') }}">
                        {{ __('front_menu.career.title') }}
                    </a>
                </li>
            </ul>
            <!-- END Header Navigation -->
        </div>
        <!-- END Middle Section -->

    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header">
        <div class="content-header content-header-fullrow">
            <form action="bd_search.html" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Close Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-secondary px-15" data-toggle="layout"
                            data-action="header_search_off">
                            <i class="fa fa-times"></i>
                        </button>
                        <!-- END Close Search Section -->
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.."
                        id="page-header-search-input" name="page-header-search-input">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary px-15">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
