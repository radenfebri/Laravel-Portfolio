<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <li class="sidebar-item {{ $menu == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- ARTIKEL --}}
        <li class="sidebar-item {{ $menu == 'article' ? 'active' : '' }} has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-journal-text"></i>
                <span>Article</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item {{ $submenu == 'categorie' ? 'active' : '' }}">
                    <a href="{{ route('categorie.index') }}">Categorie</a>
                </li>

                <li class="submenu-item {{ $submenu == 'post' ? 'active' : '' }}">
                    <a href="{{ route('article.index') }}">Post</a>
                </li>
            </ul>
        </li>

        {{-- STORE --}}
        <li class="sidebar-item {{ $menu == 'store' ? 'active' : '' }} has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-cart4"></i>
                <span>Store</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item {{ $submenu == 'categorie-product' ? 'active' : '' }}">
                    <a href="{{ route('categorie-product.index') }}">Categorie</a>
                </li>
            </ul>
        </li>

        {{-- AUTHENTICATION --}}
        <li class="sidebar-item {{ $menu == 'authentication' ? 'active' : '' }} has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-person-badge-fill"></i>
                <span>Authentication</span>
            </a>
            <ul class="submenu ">
                @can('role-index')
                <li class="submenu-item {{ $submenu == 'role' ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}">Role</a>
                </li>
                @endcan

                @can('permission-index')
                <li class="submenu-item {{ $submenu == 'permission' ? 'active' : '' }}">
                    <a href="{{ route('permission.index') }}">Permission</a>
                </li>
                @endcan

                @can('assignpermission-index')
                <li class="submenu-item {{ $submenu == 'assignpermission' ? 'active' : '' }}">
                    <a href="{{ route('assignpermission.index') }}">Assign Permission</a>
                </li>
                @endcan

                @can('assignrole-index')
                <li class="submenu-item {{ $submenu == 'assignrole' ? 'active' : '' }}">
                    <a href="{{ route('assignrole.index') }}">Assign Role to User</a>
                </li>
                @endcan

                @can('manajemenuser-index')
                <li class="submenu-item {{ $submenu == 'manajemenusers' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">Manajemen Users</a>
                </li>
                @endcan

            </ul>
        </li>

        {{-- LOG --}}
        <li class="sidebar-item {{ $menu == 'log' ? 'active' : '' }}">
            <a href="{{ route('log.index') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Log</span>
            </a>
        </li>

    </ul>
</div>
