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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                // Menampilkan SweetAlert jika ada session success
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'OK',
                        showClass: {
                            popup: 'animate_animated animate_fadeInUp' // animasi muncul
                        },
                        hideClass: {
                            popup: 'animate_animated animate_fadeOutDown' // animasi hilang
                        },
                        timer: 5000 // Waktu notifikasi muncul (dalam milidetik)
                    });
                @endif

                // Menampilkan SweetAlert jika ada error
                @if ($errors->any())
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '{{ $errors->first() }}',
                        confirmButtonText: 'OK',
                        showClass: {
                            popup: 'animate_animated animate_fadeInUp'
                        },
                        hideClass: {
                            popup: 'animate_animated animate_fadeOutDown'
                        },
                        timer: 5000
                    });
                @endif
            </script>
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
            background-color: #f8f9fa;
            /* Warna background bisa disesuaikan */
            font-size: 14px;
        }
    </style>

    </div>
    </div>
    @include('layoutsadmin.footer')

</body>

</html>
