<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <div class="navbar-nav ms-auto me-3">
    @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas'))
      <span class="nav-link"><strong>{{ Auth::user()->nama_lengkap }} ({{ ucfirst(Auth::user()->role) }})</strong></span>
     
    @endif
  </div>
</nav>
<!-- /.navbar -->

