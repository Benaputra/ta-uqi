<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Presensi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route ('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/mahasiswa">
            <i class="fas fa-fw fa-users"></i>
            <span>Mahasiswa</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/dosen*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/dosen">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Dosen</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/matakuliah*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/matakuliah">
            <i class="fas fa-fw fa-table"></i>
            <span>Mata Kuliah</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/prodi*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/prodi">
            <i class="fas fa-fw fa-table"></i>
            <span>Program Studi</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/semester*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/semester">
            <i class="fas fa-fw fa-table"></i>
            <span>Semester</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/kelas') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/kelas">
            <i class="fas fa-fw fa-table"></i>
            <span>Kelas</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/kelaskuliah') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/kelaskuliah">
            <i class="fas fa-fw fa-table"></i>
            <span>Kelas Kuliah</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/ruangan*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/ruangan">
            <i class="fas fa-fw fa-table"></i>
            <span>Ruangan</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/jadwal">
            <i class="fas fa-fw fa-table"></i>
            <span>Jadwal</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/absen*') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/absen">
            <i class="fas fa-fw fa-table"></i>
            <span>Presensi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->