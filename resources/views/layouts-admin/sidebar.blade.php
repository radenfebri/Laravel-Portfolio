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
                <li class="submenu-item ">
                    <a href="{{ route('role.index') }}">Role</a>
                </li>
                <li class="submenu-item ">
                    <a href="auth-register.html">Permission</a>
                </li>
                <li class="submenu-item ">
                    <a href="auth-forgot-password.html">Assign Permission</a>
                </li>
                <li class="submenu-item ">
                    <a href="auth-forgot-password.html">Permission to User</a>
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
