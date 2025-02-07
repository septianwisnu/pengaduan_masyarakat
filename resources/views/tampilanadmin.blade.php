@extends("layoutsadmin.app")
@section("main")

<div class="container">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      
        <div>
          <h3 class="fw-bold mb-3">Dashboard</h3>
        </div>
      </div>
      <div class="row">
        <!-- Data Petugas -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                    <i class="bi bi-columns-gap"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Data Petugas</p>
                    <h4 class="card-title">1,294</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Laporan Masuk -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-info bubble-shadow-small">
                    <i class="fas fa-user-check"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Laporan Masuk</p>
                    <h4 class="card-title">1,303</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Jumlah Diproses -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-success bubble-shadow-small">
                    <i class="fas fa-luggage-cart"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Jumlah Diproses</p>
                    <h4 class="card-title">1,345</h4> <!-- Hapus tanda `$` -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Laporan Pengaduan -->
        <div class="col-sm-6 col-md-3">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-danger bubble-shadow-small">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Laporan Pengaduan</p>
                    <h4 class="card-title">576</h4> <!-- Hapus tanda `$` -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      


      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Data Laporan Masuk</title>
          <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
          <style>
              .action-button {
                  background-color: #FFC107;
                  border: none;
                  padding: 5px 10px;
                  border-radius: 4px;
                  cursor: pointer;
              }
      
              .action-button i {
                  color: white;
              }
          </style>
      </head>
      <body>
      
          <div style="margin: 20px;">
              <h3>Data Laporan Masuk</h3>
              <table id="dataLaporan" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tgl Pengaduan</th>
                          <th>Judul Pengaduan</th>
                          <th>Kategori</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>25-02-2025</td>
                          <td>Trafic Light Jatuh</td>
                          <td>Fasilitas Umum</td>
                          <td>
                              <button class="action-button">
                                  <i class="fas fa-ellipsis-h"></i>
                              </button>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      
          <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
          <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
          <script>
              $(document).ready(function () {
                  $('#dataLaporan').DataTable({
                      "paging": true,
                      "searching": true,
                      "info": true,
                      "lengthChange": true
                  });
              });
          </script>
      
      </body>
      </html>
      

@endsection