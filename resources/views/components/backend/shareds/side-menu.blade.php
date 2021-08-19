<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @can('lihat dasbor')
        <li class="nav-item">
            <a href="{{ route('backend.dashboard.index') }}"
                class="nav-link {{ (Request::is('backend/dashboard')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{ __('Dashboard') }}
                </p>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('home.index') }}" target="_blank" class="nav-link">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                    {{ __('Halaman Utama') }}
                </p>
            </a>
        </li>


        <li class="nav-header">{{ __('Main Menu') }}</li>
        <li class="nav-item">
            <a href="{{ route('home.index') }}" target="_blank" class="nav-link">
                <i class="nav-icon fas fa-thumbtack"></i>
                <p>
                    {{ __('Halaman Utama') }}
                </p>
            </a>
        </li>


        <li class="nav-header">{{ __('Sistem') }}</li>
        @can('lihat pengguna')
        <li class="nav-item">
            <a href="{{ route('backend.users.index') }}"
                class="nav-link {{ (Request::is('backend/users')) ? 'active' : '' }} {{ (Request::is('backend/users/*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{ __('Pengguna') }}
                </p>
            </a>
        </li>
        @endcan
        @can('lihat role', 'lihat permission', 'lihat assign.permission')
        <li
            class="nav-item {{ (Request::is('backend/roles/*')) ? 'menu-open' : '' }} {{ (Request::is('backend/roles')) ? 'menu-open' : '' }}
        {{ (Request::is('backend/permissions/*')) ? 'menu-open' : '' }} {{ (Request::is('backend/permissions')) ? 'menu-open' : '' }}
        {{ (Request::is('backend/assignpermission')) ? 'menu-open' : '' }} {{ (Request::is('backend/assignpermission/*')) ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ (Request::is('backend/roles/*')) ? 'active' : '' }} {{ (Request::is('backend/roles')) ? 'active' : '' }}
        {{ (Request::is('backend/permissions/*')) ? 'active' : '' }} {{ (Request::is('backend/permissions')) ? 'active' : '' }}
        {{ (Request::is('backend/assignpermission')) ? 'active' : '' }} {{ (Request::is('backend/assignpermission/*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>
                    {{ __('Role & Permission') }}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('lihat role')
                <li class="nav-item">
                    <a href="{{ route('backend.roles.index') }}" class="nav-link
                    {{ (Request::is('backend/roles')) ? 'active' : '' }} {{ (Request::is('backend/roles/*')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('Role') }}</p>
                    </a>
                </li>
                @endcan
                @can('lihat permission')
                <li class="nav-item">
                    <a href="{{ route('backend.permissions.index') }}" class="nav-link
                    {{ (Request::is('backend/permissions')) ? 'active' : '' }} {{ (Request::is('backend/permissions/*')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('Permission') }}</p>
                    </a>
                </li>
                @endcan
                @can('lihat assign.permission')
                <li class="nav-item">
                    <a href="{{ route('backend.assignpermission.index') }}" class="nav-link
                    {{ (Request::is('backend/assignpermission')) ? 'active' : '' }} {{ (Request::is('backend/assignpermission/*')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('Assign permission') }}</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @can('lihat pengaturan')
        <li class="nav-item">
            <a href="{{ route('backend.setting.index') }}"
                class="nav-link {{ (Request::is('backend/settings/*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    {{ __('Pengaturan') }}
                </p>
            </a>
        </li>
        @endcan
        <li class="nav-item">
            <a href="{{ route('backend.profile.index') }}"
                class="nav-link {{ (Request::is('backend/profile')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    {{ __('Profil') }}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    {{ __('Keluar') }}
                </p>
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>
