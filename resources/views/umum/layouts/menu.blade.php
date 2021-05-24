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
