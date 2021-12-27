<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown me-1">
            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li>
                    <h6 class="dropdown-header">Mail</h6>
                </li>
                <li><a class="dropdown-item" href="#">No new mail</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown me-3">
            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li>
                    <h6 class="dropdown-header">Notifications</h6>
                </li>
                <li><a class="dropdown-item">No notification available</a></li>
            </ul>
        </li>
    </ul>
    <div class="dropdown">
        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-menu d-flex">
                <div class="user-name text-end me-3">
                    <h6 class="mb-0 text-gray-600">John Ducky</h6>
                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                </div>
                <div class="user-img d-flex align-items-center">
                    <div class="avatar avatar-md">
                        <img src="{{ asset('template') }}/images/faces/1.jpg">
                    </div>
                </div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <li>
                <h6 class="dropdown-header">Hello, John!</h6>
            </li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                    Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                    Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                    Wallet</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>


        </ul>
    </div>
</div>
