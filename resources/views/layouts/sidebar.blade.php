<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-1">PT KREASI REMPAH INDONESIA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item{{ Request::routeIs('home') ? ' active' : ''}}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    @if (auth()->user()->role_id == 1)
        <li class="nav-item{{ Request::routeIs('dataKaryawan.*') ? ' active' : ''}}">
            <a class="nav-link" href="{{ route('dataKaryawan.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Karyawan</span></a>
        </li>

        <li class="nav-item{{ Request::routeIs('data-absensi.*') ? ' active' : ''}}">
            <a class="nav-link" href="{{ route('data-absensi.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Absensi</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
