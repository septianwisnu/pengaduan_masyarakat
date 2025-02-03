<!DOCTYPE html>
<html lang="en">

<head>
    @include('layoutsmasyarakat.head')
</head>

<body class="index-page">
    @include('layoutsmasyarakat.navbar')

    @yield('content')



    <footer class="footer light-background">
      <div class="container footer-top">
        <div class="row align-items-center">
          <!-- Logo dan Informasi -->
          <div class="col-lg-12 footer-about d-flex align-items-center">
            <img src="{{ asset('assets/img/logo_kota_banjar.png')}}" alt="Logo Suara Rejasari" class="footer-logo" />
            <div class="footer-info">
              <h2 class="footer-title">SUARA REJASARI</h2>
              <p class="footer-tagline">
                "Jadilah bagian dari perubahan! Segera bergabung dan sampaikan suara Anda."
              </p>
              <p><strong>Phone:</strong> +62 899 9999</p>
              <p><strong>Email:</strong> rejasari@gmail.com</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-center footer-copyright">
            <p>&copy; Copyright UKK RPL 2025. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    
    
    
    @include('layoutsmasyarakat.footer')

</body>



</html>