<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                @auth('admin')
                    @foreach (config('menu.admin') as $menu)
                        @if (!isset($menu['submenu']))
                            <li @if (request()->segment(2) == $menu['active-segment']) class="menuitem-active" @endif>
                                <a href="{{ isset($menu['route-name']) ? route($menu['route-name']) : '#' }}"
                                    class="tp-link @if (request()->segment(2) == $menu['active-segment']) active @endif">
                                    <i data-feather="{{ $menu['icon'] }}"></i>
                                    <span> {{ $menu['label'] }} </span>
                                </a>
                            </li>
                        @else
                            <li @if (request()->segment(2) == $menu['active-segment']) class="menuitem-active" @endif>
                                <a href="#submenu-{{ $loop->iteration }}" data-bs-toggle="collapse">
                                    <i data-feather="{{ $menu['icon'] }}"></i>
                                    <span> {{ $menu['label'] }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if (request()->segment(2) == $menu['active-segment']) show @endif"
                                    id="submenu-{{ $loop->iteration }}">
                                    <ul class="nav-second-level">
                                        @foreach ($menu['submenu'] as $submenu)
                                            <li>
                                                <a href="{{ isset($submenu['route-name']) ? route($submenu['route-name']) : '#' }}"
                                                    class="tp-link @if (request()->segment(3) == $submenu['active-segment']) active @endif">
                                                    {{ $submenu['label'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endauth

                @auth('user')
                    @foreach (config('menu.user') as $menu)
                        @if (!isset($menu['submenu']))
                            <li @if (request()->segment(1) == $menu['active-segment']) class="menuitem-active" @endif>
                                <a href="{{ isset($menu['route-name']) ? route($menu['route-name']) : '#' }}"
                                    class="tp-link @if (request()->segment(1) == $menu['active-segment']) active @endif">
                                    <i data-feather="{{ $menu['icon'] }}"></i>
                                    <span> {{ $menu['label'] }} </span>
                                </a>
                            </li>
                        @else
                            <li @if (request()->segment(1) == $menu['active-segment']) class="menuitem-active" @endif>
                                <a href="#submenu-{{ $loop->iteration }}" data-bs-toggle="collapse">
                                    <i data-feather="{{ $menu['icon'] }}"></i>
                                    <span> {{ $menu['label'] }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @if (request()->segment(1) == $menu['active-segment']) show @endif"
                                    id="submenu-{{ $loop->iteration }}">
                                    <ul class="nav-second-level">
                                        @foreach ($menu['submenu'] as $submenu)
                                            <li>
                                                <a href="{{ isset($submenu['route-name']) ? route($submenu['route-name']) : '#' }}"
                                                    class="tp-link @if (request()->segment(2) == $submenu['active-segment']) active @endif">
                                                    {{ $submenu['label'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @endauth

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->
