@extends('layoutsadmin.app')

@section('main')
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Masyarakat</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Masyarakat</h3>
                            <a href="/masyarakat_add" class="btn float-right btn-outline-secondary btn-md">
                                <li class="fa fa-plus"></li> Add Data Masyarakat
                            </a>
                       

                        
                            

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->nik }}</td>
                                                <td>{{ $user->nama_lengkap }}</td>
                                                <td>{{ $user->alamat }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <!-- Tombol Lihat (Biru) -->
                                                        <a href="/masyarakat_detail/{{ $user->id }}" class="btn btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                
                                                       
                                                        <!-- Tombol Hapus (Merah) -->
                                                        <form action="hapus_masyarakat/{{ $user->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>        
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="mt-3 d-flex justify-content-end">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#masyarakatTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
