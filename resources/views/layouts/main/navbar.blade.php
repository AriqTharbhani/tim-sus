<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard.admin') }}" class="nav-link">Dashboard</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown User Profile -->
        <li class="nav-item dropdown">
        <a class="user-block" data-toggle="dropdown" href="#">
            @if (Auth::user()->role == 1)
            <span class="username">{{Auth::user()->admin->nama_lengkap}}</span>
            <span class="description">Administrator</span>
            @elseif(Auth::user()->role == 2)
            <span class="username">{{Auth::user()->guru->nama_lengkap}}</span>
            <span class="description">Guru</span>
            @else
            <span class="username">{{Auth::user()->siswa->nama_lengkap}}</span>
            <span class="description">Siswa</span>
            @endif
          </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{ route('profile') }}" class="dropdown-item">
                <i class="fas fa-user-circle"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
        <!-- End Dropdown User Profile -->
    </ul>
</nav>
<!-- /.navbar -->
