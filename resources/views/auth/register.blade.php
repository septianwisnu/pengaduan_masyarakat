<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo_kota_banjar.png') }}" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


    <style>
        .text-danger {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        body {
            margin: ;
            font-family: Arial, sans-serif;
            background-color: #2E5077;
            display: flex;
            padding: 20px;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        .container {
            background-color: white;
            width: 650px;
            border-radius: 10px;
            margin: 50px auto;
            /* Menambah jarak atas dan bawah */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 80px;
            display: block;
            margin: 0 auto 10px;
        }

        h2 {
            text-align: center;
            color: #2e5c93;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
            resize: none;
        }

        .full-width {
            grid-column: span 2;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        button {
            background-color: #2e5c93;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #1d4475;
        }

        .login-container {
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
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
                timer: 2500
            });
        @endif

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    });
</script>

<body>

    <div class="container">
        <img class="logo" src="{{ asset('assets/img/logo_kota_banjar.png') }}" alt="logo">
        <h2>Register Akun</h2>

        <form action="/store/register" method="post">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label><strong>NIK</strong></label>
                    <input name="nik" type="text" placeholder="Masukkan NIK">
                    @error('nik')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Nama Lengkap</strong></label>
                    <input name="nama_lengkap" type="text" placeholder="Masukkan Nama Lengkap">
                    @error('nama_lengkap')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Jenis Kelamin</strong></label>
                    <select name="jenis_kelamin">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Username</strong></label>
                    <input name="username" type="text" placeholder="Masukkan Username">
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>Password</strong></label>
                    <input name="password" type="password" placeholder="Masukkan Password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label><strong>No Telepon</strong></label>
                    <input name="no_telepon" type="text" placeholder="Masukkan Nomor Telepon">
                    @error('no_telepon')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label><strong>Alamat</strong></label>
                    <textarea name="alamat" placeholder="Masukkan Alamat"></textarea>
                    @error('alamat')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <select name="role" hidden>
                        <option value="masyarakat" {{ old('role') == 'masyarakat' ? 'selected' : '' }} hidden>
                            Masyarakat
                        </option>
                    </select>
                    @error('role')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="button-container">
                <button type="submit">REGISTER</button>
            </div>
        </form>

        <div class="login-container">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login sekarang</a></p>
        </div>

    </div>




</body>

</html>
