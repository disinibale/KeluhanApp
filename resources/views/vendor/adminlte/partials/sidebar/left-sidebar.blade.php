<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if (config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu" @if (config('adminlte.sidebar_nav_animation_speed') != 300)
                data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if (!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @if (Auth::user()->hasRole('admin'))
                    @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
                @else
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" {{ route('user.complaints.index') }} " class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Keluhan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/u/processedComplaints') }}" class="nav-link">
                            <i class="nav-icon fas fa-envelope-open"></i>
                            <p>
                                Keluhan Diproses
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/u/repairements') }}" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Laporan Perbaikan
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

</aside>
