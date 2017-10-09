<nav id="main-nav" class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1>
                {!! link_to_route('all_tickets', appName()) !!}
            </h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="right">
            <li class="divider"></li>
            @if (Auth::guest())
                <li><a href="{{ url('/register') }}">Register</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li class="divider"></li>
            @else
            @if(Auth::user()->is_admin())
            <li class="user-role">
                {!! link_to_route('admin_area', ucwords(Auth::user()->role)) !!}
            </li>
            @endif
                <li class="divider"></li>
                <li class="has-dropdown">
                    {!! link_to_route('show_profile', Auth::user()->name) !!}
                    <ul class="dropdown">
                        <li>{!! link_to_route('show_profile', 'Profile') !!}</li>
                        <li>{!! link_to_route('user_settings', 'Settings') !!}</li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}">Logout</a></li>
                <li class="divider"></li>
            @endif
        </ul>
    </section>
</nav>