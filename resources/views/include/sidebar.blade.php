<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
          <img src="{{asset('frontend\img\polnep.png')}}" class="img-fluid logo-sidebar" alt="logo" width="50" height="50">
        </div>
        <div class="sidebar-brand-text ml-2">
          Presensi
        </div>
      </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        @role('dosen')
            Sidebar Dosen
        @endrole
        @role('admin')
            Sidebar Admin
        @endrole
        @role('AdminElektronika|AdminInformatika|AdminListrik')
            Sidebar Admin Prodi
        @endrole
        @role('mahasiswa')
            Sidebar Mahasiswa
        @endrole

    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @role('admin')
        <li class="nav-item {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Mahasiswa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Program Studi</h6>
                    @foreach (\App\Http\Controllers\MahasiswaController::prodi() as $data)
                        <a class="collapse-item"
                            href="{{ url('admin/mahasiswa/' . $data->id) }}">{{ $data->name_prodi }}</a>
                    @endforeach
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/dosen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dosen">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Dosen</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/matakuliah*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/matakuliah">
                <i class="fas fa-book-open"></i>
                <span>Mata Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/prodi*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/prodi">
                <i class="fas fa-layer-group"></i>
                <span>Program Studi</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/semester*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/semester">
                <i class="fas fa-sticky-note"></i>
                <span>Semester</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/kelas') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelas">
                <i class="fas fa-fw fa-table"></i>
                <span>Kelas</span></a>
        </li>
        </li>
        <li class="nav-item {{ Request::is('admin/kelaskuliah') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelaskuliah">
                <i class="fas fa-store-alt"></i>
                <span>Kelas Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/ruangan*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/ruangan">
                <i class="fas fa-door-open"></i>
                <span>Ruangan</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/jadwal">
                <i class="fas fa-fw fa-table"></i>
                <span>Jadwal</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/absen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/filter-absen">
                <i class="fas fa-bookmark"></i>
                <span>Rekapan Presensi</span></a>
        </li>
    @endrole

    @role('dosen')
        <li class="nav-item {{ Request::is('dashboard/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/dashboard/rekap-absen') }}">
                <i class="fas fa-copy"></i>
                Rekapan Presensi
            </a>
        </li>
    @endrole

    @role('AdminInformatika')
        <li class="nav-item {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Mahasiswa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Program Studi</h6>
                    @foreach (\App\Http\Controllers\MahasiswaController::prodi() as $data)
                        @if ($data->name_prodi == 'Teknik Informatika')
                            <a class="collapse-item"
                                href="{{ url('admin/mahasiswa/' . $data->id) }}">{{ $data->name_prodi }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/dosen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dosen">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Dosen</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/matakuliah*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/matakuliah">
                <i class="fas fa-book-open"></i>
                <span>Mata Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/kelaskuliah') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelaskuliah">
                <i class="fas fa-store-alt"></i>
                <span>Kelas Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/ruangan*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/ruangan">
                <i class="fas fa-door-open"></i>
                <span>Ruangan</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/jadwal">
                <i class="fas fa-fw fa-table"></i>
                <span>Jadwal</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/absen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/filter-absen">
                <i class="fas fa-bookmark"></i>
                <span>Rekapan Presensi</span></a>
        </li>
    @endrole

    @role('AdminElektronika')
        <li class="nav-item {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Mahasiswa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Program Studi</h6>
                    @foreach (\App\Http\Controllers\MahasiswaController::prodi() as $data)
                        @if ($data->name_prodi == 'Teknik Elektronika')
                            <a class="collapse-item"
                                href="{{ url('admin/mahasiswa/' . $data->id) }}">{{ $data->name_prodi }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/dosen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dosen">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Dosen</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/matakuliah*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/matakuliah">
                <i class="fas fa-book-open"></i>
                <span>Mata Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/kelaskuliah') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelaskuliah">
                <i class="fas fa-store-alt"></i>
                <span>Kelas Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/ruangan*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/ruangan">
                <i class="fas fa-door-open"></i>
                <span>Ruangan</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/jadwal">
                <i class="fas fa-fw fa-table"></i>
                <span>Jadwal</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/absen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/filter-absen">
                <i class="fas fa-bookmark"></i>
                <span>Rekapan Presensi</span></a>
        </li>
    @endrole

    @role('AdminListrik')
        <li class="nav-item {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Mahasiswa</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Program Studi</h6>
                    @foreach (\App\Http\Controllers\MahasiswaController::prodi() as $data)
                        @if ($data->name_prodi == 'Teknik Listrik')
                            <a class="collapse-item"
                                href="{{ url('admin/mahasiswa/' . $data->id) }}">{{ $data->name_prodi }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/dosen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dosen">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Dosen</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/matakuliah*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/matakuliah">
                <i class="fas fa-book-open"></i>
                <span>Mata Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/kelaskuliah') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelaskuliah">
                <i class="fas fa-store-alt"></i>
                <span>Kelas Kuliah</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/ruangan*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/ruangan">
                <i class="fas fa-door-open"></i>
                <span>Ruangan</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/jadwal">
                <i class="fas fa-fw fa-table"></i>
                <span>Jadwal</span></a>
        </li>
        <li class="nav-item {{ Request::is('admin/absen*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/filter-absen">
                <i class="fas fa-bookmark"></i>
                <span>Rekapan Presensi</span></a>
        </li>
    @endrole

    @role('mahasiswa')
        <li class="nav-item {{ Request::is('dashboard/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/dashboard/rekap-absen') }}">
                <i class="fas fa-bookmark"></i>
                Rekapan Mahasiswa
            </a>
        </li>
    @endrole
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
