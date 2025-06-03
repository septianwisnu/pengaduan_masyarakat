<!DOCTYPE html>
<html lang="en">

<head>
    @include('layoutsmasyarakat.head')
</head>

<body class="index-page">
    @include('layoutsmasyarakat.navbar')

    <div>
        @yield('content')
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


    <div class="footer ">
        <footer class="footer">
            <div class="container footer-top">
                <div class="row align-items-center">
                    <!-- Logo dan Informasi -->
                    <div class="col-lg-12 footer-about d-flex align-items-center">
                        <img src="{{ asset('assets/img/logo_kota_banjar.png') }}" alt="Logo Suara Rejasari"
                            class="footer-logo" />
                        <div class="footer-info">
                            <h2 class="footer-title">SUARA REJASARI</h2>
                            <p class="footer-tagline">
                                "Jadilah bagian dari perubahan! Segera bergabung dan sampaikan suara Anda."
                            </p>
                            <p><strong>Phone:</strong> +6281990293182</p>
                            <p><strong>Email:</strong>rejariid@gmail.com</p>
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
    </div>



    @include('layoutsmasyarakat.footer')

</body>



</html>
