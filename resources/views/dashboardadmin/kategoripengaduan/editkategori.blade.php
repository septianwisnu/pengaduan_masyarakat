@extends('layoutsadmin.app')

@section('main')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Kategori</h1>
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
                        <h3 class="card-title">Edit Data Kategori</h3>
                        <a href="/kategori" class="btn float-right btn-outline-secondary btn-md">
                            <li class="fa fa-undo"></li> Kembali
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-6">
                            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">


                                @csrf  
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" id="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" value="{{ $kategori->deskripsi }}" id="deskripsi" class="form-control" value="{{ old('deskripsi', $kategori->deskripsi) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-md">
                                        <i class="fa fa-save"></i> Update
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
