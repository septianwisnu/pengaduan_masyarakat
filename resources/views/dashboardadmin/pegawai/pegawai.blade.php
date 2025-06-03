@extends('layoutsadmin.app')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pegawai</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pegawai</h3>
                            <a href="/pegawai/add" class="btn float-right btn-outline-secondary btn-md">
                                <li class="fa fa-plus"></li> Add Data Pegawai
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIK</th>
                                        <th>Nama lengkap</th>
                                        <th>username</th>
                                        <th>Alamat</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($pegawais as $key => $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- Tombol Lihat (Biru) -->
                                                <a href="/detailpegawai/{{ $user->id }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <!-- Tombol Edit (Kuning) -->
                                                <a href="/editpegawai/{{ $user->id }}" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Tombol Hapus (Merah) -->
                                                <form action="hapus_pegawai/{{ $user->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus Data pegawai ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
