<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <li class="sidebar-item {{ $menu == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item {{ $menu == 'authentication' ? 'active' : '' }} has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-person-badge-fill"></i>
                <span>Authentication</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item {{ $submenu == 'role' ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}">Role</a>
                </li>
                <li class="submenu-item {{ $submenu == 'permission' ? 'active' : '' }}">
                    <a href="{{ route('permission.index') }}">Permission</a>
                </li>
                <li class="submenu-item {{ $submenu == 'assignpermission' ? 'active' : '' }}">
                    <a href="{{ route('assignpermission.index') }}">Assign Permission</a>
                </li>
                <li class="submenu-item {{ $submenu == 'assignrole' ? 'active' : '' }}">
                    <a href="{{ route('assignrole.index') }}">Assign Role to User</a>
                </li>
                <li class="submenu-item {{ $submenu == 'manajemenusers' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">Manajemen Users</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item {{ $menu == 'log' ? 'active' : '' }}">
            <a href="{{ route('log.index') }}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Log</span>
            </a>
        </li>
    </ul>
</div>
