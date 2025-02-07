<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assetsadmin/img/kaiadmin/logo_kota_banjar.png" alt="navbar brand" class="navbar-brand"
                    height="20" />
                <span class="text-white p-1">SUARA REJASARI</span>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Menu Dashboard -->
                <ul class="nav">
                  <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                      <a href="/" class="nav-link">
                          <i class="fas fa-home"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                </ul>              

                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="/">
                        <i class="fa fa-user-friends"></i>
                        <p>Masyarakat</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="/">
                        <i class="fas fa-user"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="/">
                        <i class="fa fa-building"></i>
                        <p>Kategori Pengaduan</p>
                    </a>
                </li>

                <p class="nav-item container mt-4" style="color: #bbb; font-weight: bold; padding-left: 20px;">Laporan
                </p>

                <!-- Laporan Section -->
                <li class="nav-item {{ Request::is('components/*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#base"
                        aria-expanded="{{ Request::is('keamanan') || Request::is('components/*') ? 'true' : 'false' }}"
                        data-parent="#sidebar-menu">
                        <i class="fa fa-envelope"></i>
                        <p>Laporan Masuk</p>
                    </a>
                    <p class="nav-item container mt-4" style="color: #bbb; font-weight: bold; padding-left: 20px;">
                        Export</p>

                    <!-- Export Section -->
                    <a data-bs-toggle="collapse" href="#base"
                        aria-expanded="{{ Request::is('keamanan') || Request::is('components/*') ? 'true' : 'false' }}"
                        data-parent="#sidebar-menu">
                        <i class="fa fa-print"></i>
                        <p>Generate Laporan</p>
                    </a>

                </li>
            </ul>
        </div>
    </div>
</div>
