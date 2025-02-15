<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layoutspegawai.head')
  </head>
  <body>
  <div class="wrapper">
    @include('layoutspegawai.sidebar')
    <div class="main-panel">
            @include('layoutspegawai.navbar')

        @yield('main')
        </div>
        </div>

      </div>


    </div>
   <!-- resources/views/layouts/footer.blade.php -->

   <footer class="main-footer">
    <strong>Copyright &copy; 2025 By UKK RPL 2025.</strong> All rights reserved.
  </footer>
  
  <style>
    .main-footer {
      text-align: center;
      padding: 10px;
      background-color: #f8f9fa; /* Warna background bisa disesuaikan */
      font-size: 14px;
    }
  </style>
  
    </div>
    </div>
    @include('layoutspegawai.footer')
    
</body>
</html>