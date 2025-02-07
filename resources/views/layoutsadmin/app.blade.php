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

            <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
        @yield('main')
        </div>
        </div>

      </div>


    </div>
    <footer class="footer">
      <div class="container-fluid d-flex justify-content-center">
        <div class="copyright">
          @Copyright UKK RPL 2025 All rights Reserved
        </div>
      </div>
    </footer>
    
    </div>
    </div>
    @include('layoutsadmin.footer')
    
</body>
</html>