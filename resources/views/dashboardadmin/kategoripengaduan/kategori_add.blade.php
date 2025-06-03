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
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-md-6">
                                    <form action="/store/kategori" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori</label>
                                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-md">
                                                <i class="fa fa-save"></i> Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                
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