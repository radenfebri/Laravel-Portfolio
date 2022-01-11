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
            <div class="user-name my-auto text-end me-3">
                <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
            </div>
            <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md">
                    @if ( Auth::user()->foto )
                        <img src="{{ asset('storage/'. Auth::user()->foto ) }}" alt="{{ Auth::user()->name }}">
                    @else
                        <img src="{{ asset('template') }}/images/faces/profile.jpg" alt="{{ Auth::user()->name }}">
                    @endif
                </div>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li>
            <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}!</h6>
        </li>
        <li><a class="dropdown-item {{ $menu == 'profile' ? 'active' : '' }}" href="/{{ Auth::user()->username }}"><i class="icon-mid bi bi-person me-2"></i>MyProfile</a></li>
        <li><a class="dropdown-item {{ $menu == 'settingprofile' ? 'active' : '' }}" href="{{ route('profile.index') }}"><i class="icon-mid bi bi-gear me-2"></i>Settings</a></li>
        <li><a class="dropdown-item {{ $menu == 'changepassword' ? 'active' : '' }}" href=""><i class="icon-mid bi bi-lock me-2"></i>Change Password</a></li>
        {{-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>Wallet</a></li> --}}
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
