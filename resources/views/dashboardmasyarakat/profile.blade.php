@extends("layoutsmasyarakat.app")

@section("content")
<div class="container mt-4 mb-3">
    <div class="row">
        <div class="col-lg-3">
            <img src="/assets/img/team/team-1.jpg" alt="" width="200px" class="img-profile">
        </div>
        <div class="col-lg-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                        aria-selected="true">Profil</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Ubah Password</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="nik" id="textNik"
                                        value="{{ auth()->user()->nik }}" required>
                                    <label for="textNik">NIK</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="nama" id="textNama"
                                        value="{{ auth()->user()->nama }}" required>
                                    <label for="textNama">Nama</label>
                                </div>
                                <div class="form-floating">
                                    <select name="jenis_kelamin" id="selectJenisKelamin" class="form-control">
                                        <option value="Laki-laki" {{ auth()->user()->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ auth()->user()->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <label for="selectJenisKelamin">Jenis Kelamin</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" name="nomor_telepon" class="form-control"
                                        id="textNomorTelepon" value="{{ auth()->user()->nomor_telepon }}" required>
                                    <label for="textNomorTelepon">Nomor Telepon</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <textarea class="form-control" name="alamat" id="textAlamat"
                                        style="height: 100px" required>{{ auth()->user()->alamat }}</textarea>
                                    <label for="textAlamat">Alamat</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-floating my-3">
                            <input type="password" name="password" id="textPassword" class="form-control" required>
                            <label for="textPassword">Password Baru</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="password" name="password_confirmation" id="textPasswordConfirm" class="form-control" required>
                            <label for="textPasswordConfirm">Konfirmasi Password</label>
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
