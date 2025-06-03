<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan Desa Rejasari</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 20px;
            padding: 0;
            background-color: white;
        }

        .container {
            width: 100%;
            max-width: 750px;
            margin: 20px auto;
            padding: 15px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 10px;
        }

        .kop-surat img {
            height: 70px;
            display: block;
            margin: 0 auto;
        }

        .kop-surat h2,
        .kop-surat h3,
        .kop-surat p {
            margin: 2px 0;
            font-size: 14px;
        }

        .letterhead-line {
            border-top: 2px solid black;
            border-bottom: 1px solid black;
            margin: 10px 0;
        }

        .table-container {
            overflow-x: auto;
            max-width: 100%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .table th,
        .table td {
            padding: 6px;
            border: 1px solid #000;
            text-align: left;
            word-wrap: break-word;
        }

        .table th {
            background-color: white;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 11px;
            color: white;
        }

        .bg-warning {
            background-color: orange;
        }

        .bg-info {
            background-color: blue;
        }

        .bg-success {
            background-color: green;
        }

        .bg-danger {
            background-color: red;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
            font-size: 12px;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                padding: 10px;
                max-width: 100%;
            }

            .btn {
                display: none;
            }

            .table {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="kop-surat">
            <img src="{{ asset('public/storage/logo_kota_banjar.png') }}" alt="Logo Desa">
            <h2>PEMERINTAH KOTA BANJAR</h2>
            <h3>KECAMATAN LANGENSARI</h3>
            <h3>DESA REJASARI</h3>
            <p>Alamat: Jl. Mandor Martinem Roy I No. 73, Kecamatan Langensari, Kota Banjar</p>
            <p>Email: rejariid@gmail.com | Telp: +62819-9029-3182</p>
        </div>
        <div class="letterhead-line"></div>
        <h3 class="text-center">Laporan Pengaduan Masyarakat</h3>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 10%;">Tanggal</th>
                        <th style="width: 13%;">Nama Pengadu</th>
                        <th style="width: 12%;">Kategori</th>
                        <th style="width: 20%;">Isi Pengaduan</th>
                        <th style="width: 8%;">Status</th>
                        <th style="width: 12%;">Nama Petugas</th>
                        <th style="width: 20%;">Tanggapan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pengaduan->created_at->format('d F Y') }}</td>
                            <td>{{ $pengaduan->petugas->nama_lengkap }}</td>
                            <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Tersedia' }}</td>
                            <td>{{ $pengaduan->isi_pengaduan }}</td>
                            <td>
                                <span
                                    class="badge {{ $pengaduan->status == 'new' ? 'bg-warning' : ($pengaduan->status == 'process' ? 'bg-primary' : ($pengaduan->status == 'selesai' ? 'bg-success' : 'bg-danger')) }}">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </td>
                            <td>{{ $pengaduan->tanggapan->petugas->nama_lengkap ?? 'Belum Ditanggapi' }}</td>
                            <td>{{ $pengaduan->tanggapan->tanggapan ?? 'Belum Ada Tanggapan' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p class="mt-4">Demikian laporan ini kami sampaikan. Terima kasih.</p>
        <div class="footer">
            <p>Hormat Kami,</p>
            <p>{{ auth()->user()->nama_lengkap }}</p>
            <p>{{ now()->format('d F Y') }}</p>
        </div>
    </div>
</body>

</html>
