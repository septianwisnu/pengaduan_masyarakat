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
                            <h3 class="card-title">Data Kategori</h3>
                            <a href="/tambah_kategori " class="btn float-right btn-outline-secondary btn-md">
                                <li class="fa fa-plus"></li> Add Data Kategori
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $key => $kategori)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td>{{ $kategori->deskripsi }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <!-- Tombol Edit (Kuning) -->
                                                    <a href="/editkategori/{{ $kategori->id }}" class="btn btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <!-- Tombol Hapus (Merah) -->
                                                    <form action="hapus_kategori/{{ $kategori->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus Kategori ini?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                        </tr>
                                    @endforeach

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
