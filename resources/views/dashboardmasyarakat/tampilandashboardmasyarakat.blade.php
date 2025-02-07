@extends("layoutsmasyarakat.app")

@section("content")

<body>
    <div class="container Masyarakat">
        <h2>Beranda Masyarakat</h2>
        <div class="btn-container">
            <a href="{{ route('buatpengaduan') }}">
                <button>Buat Pengaduan</button>
            </a>
        </div>

        <!-- Tabel Pengaduan -->
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tgl Pengaduan</th>
                    <th>Judul Pengaduan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>12-12-2022</td>
                    <td>Limbah Pabrik ABCD</td>
                    <td>Pencemaran</td>
                    <td><button class="btn btn-primary btn-xs">
                            <li class="fa fa-list"></li>
                        </button> </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

@endsection

@push('styles')
    <style>
        .table {
            width: 100%;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-bordered th, .table-bordered td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .btn-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .status.aktif {
            color: green;
        }

        .status.tidak-aktif {
            color: red;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table td {
            background-color: #ffffff;
        }
    </style>
@endpush
