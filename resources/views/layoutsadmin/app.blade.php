<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layoutsadmin.head')
  </head>
  <body>
  <div class="wrapper">
    @include('layoutsadmin.sidebar')
    <div class="main-panel">
            @include('layoutsadmin.navbar')

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
    @include('layoutsadmin.footer')
    
</body>
</html>