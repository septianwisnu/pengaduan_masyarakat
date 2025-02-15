<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 custom-sidebar">
    <!-- Brand Logo -->
    <div class="brand-logo-container d-flex align-items-center justify-content-center py-3">
        <img src="{{ asset('assets/img/logo_kota_banjar.png') }}" 
             alt="Logo Kota Banjar" 
             class="brand-logo img-circle elevation-3" 
             style="height: 50px; width: auto; margin-right: 10px;">
        <span class="brand-text text-white custom-brand-text">
            SUARA <br> REJASARI
        </span>
    </div>
    
    <style>
      .custom-brand-text {
          font-weight: bold;
          font-size: 1.3rem; /* Bisa disesuaikan */
          text-align: left;
      }
    </style>
    
    

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="/tampilanadmin" class="nav-link {{ request()->is('tampilanadmin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/masyarakat" class="nav-link {{ request()->is('masyarakat') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Masyarakat</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/pegawai" class="nav-link {{ request()->is('pegawai') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kategori" class="nav-link {{ request()->is('kategori') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Kategori Pengaduan</p>
                    </a>
                </li>
                
                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="/detail_pengaduan" class="nav-link {{ request()->is('laporanmasuk') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Laporan Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/tambah_tanggapan/{id}" class="nav-link {{ request()->is('datatanggapan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Tanggapan</p>
                    </a>
                </li>

                <li class="nav-header">Export</li>
                <li class="nav-item">
                    <a href="/generate" class="nav-link {{ request()->is('generate') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Generate Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
    
    <!-- Logout Section -->
    <div class="logout-section text-center py-3">
        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button class="btn btn-secondary btn-md" type="submit">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</aside>

<style>
    .custom-sidebar {
        background-color: #2E5077 !important;
    }
</style>
