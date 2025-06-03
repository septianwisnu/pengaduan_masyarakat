<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo_kota_banjar.png" rel="icon') }}">
    <link href="{{ asset('assets/img/logo_kota_banjar.png') }}" rel="icon">

</head>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    });
</script>

<body>
    <div class="login-container">
        <img src="{{ asset('assets/img/logo_kota_banjar.png') }}" alt="logo">
        <h2>Login Ke Akun Anda</h2>

        @if (session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <form action="/store/login" method="post" class="mt-4">
            @csrf
            <!-- Username Input -->
            <div class="form-group mb-3">
                <label for="username"><strong>Username</strong></label>
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    id="username" placeholder="Masukkan Username Anda" value="{{ old('username') }}">
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-group mb-3">
                <label for="password"><strong>Password</strong></label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="Masukkan Password Anda">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block mt-2">LOGIN</button>
            </div>
        </form>

        <div class="register-container">
            <p>Belum punya akun? <a href="{{ route('register') }}">Buat sekarang</a></p>
        </div>
    </div>


</body>

</html>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #2E5077;
        font-family: Arial, sans-serif;
    }

    .login-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 400px;
    }


    .login-container img {
        width: 120px;
        height: 100px;
        height: auto;
    }



    h2 {
        color: #2e5c93;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
    }

    button {
        background-color: #2e5c93;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
        display: inline-block;
        width: auto;
        /* Ukuran sesuai teks */
        min-width: 120px;
        /* Biar tidak terlalu kecil */
    }

    button:hover {
        background-color: #0056b3;
        /* Warna biru lebih gelap saat hover */
    }

    .register-container {
        margin-top: 20px;
        font-size: 14px;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    @media (max-width: 768px) {
        .login-container {
            width: 90%;
        }
    }

    @media (max-width: 480px) {
        .login-container {
            width: 95%;
        }
    }
</style>


