@extends('layoutsadmin.app')

@section('main')
    <div class="container mt-4 mb-3">
        <div class="row">
            <div class="col-lg-3">
                <img src="/assets/img/team/team-1.jpg" alt="" width="200px" class="img-profile">
            </div>
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Profil</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Ubah
                            Password</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('updatePegawai.updatePegawai', ['id' => auth()->id()]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" name="nik" id="nik"
                                            value="{{ auth()->user()->nik }}" required>
                                        <label for="nik">NIK</label>
                                    </div>
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                            value="{{ auth()->user()->nama_lengkap }}" required>
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                    </div>
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" name="username" id="username"
                                            value="{{ old('username', auth()->user()->username) }}" required>
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-floating">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="laki-laki"
                                                {{ auth()->user()->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="perempuan"
                                                {{ auth()->user()->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                    </div>
                                    <div class="form-floating my-3">
                                        <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                                            value="{{ auth()->user()->no_telepon }}" required>
                                        <label for="no_telepon">Nomor Telepon</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <textarea class="form-control" name="alamat" id="alamat" style="height: 100px" required>{{ auth()->user()->alamat }}</textarea>
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('updatePassword.updatePassword', ['id' => auth()->id()]) }}) }}"
                            method="POST">
                            @csrf
                            <div class="form-floating my-3">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <label for="password">Password Baru</label>
                            </div>
                            <div class="form-floating my-3">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                                <label for="password_confirmation">Konfirmasi Password</label>
                            </div>
                            <div class="form-floating my-3">
                                <button type="submit" class="btn btn-primary btn-md">Perbaharui Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
