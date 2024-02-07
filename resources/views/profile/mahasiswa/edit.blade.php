@extends('template.panel')

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Profil</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Data Pribadi</h4>
                            <p class="card-title-desc">Data ini bersifat <code>public</code></p>

                            <form method="POST" action="{{ route('update.profil.mahasiswa') }}">
                                @csrf
                                @method('PUT')


                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ auth()->user()->nama }}"
                                            id="nama" name="nama">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">NIM</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ auth()->user()->nidn }}"
                                            id="nidn" name="nidn">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Program Studi</label>
                                    <div class="col-md-10">
                                            <select class="form-select" name="prodi">
                                                <option value="">Pilih Prodi</option>
                                                <option value="Matematika">Matematika</option>
                                                <option value="Statistika">Statistika</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Semester</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="semester">
                                            <option>Pilih Semester</option>
                                            <option value="1" {{ optional($mahasiswa)->semester == '1' ? 'selected' : ''}}>1</option>
                                            <option value="2"  {{ optional($mahasiswa)->semester == '2' ? 'selected' : ''}}>2</option>
                                            <option value="3"  {{ optional($mahasiswa)->semester == '3' ? 'selected' : ''}}>3</option>
                                            <option value="4"  {{ optional($mahasiswa)->semester == '4' ? 'selected' : ''}}>4</option>
                                            <option value="5"  {{ optional($mahasiswa)->semester == '5' ? 'selected' : ''}}>5</option>
                                            <option value="6"  {{ optional($mahasiswa)->semester == '6' ? 'selected' : ''}}>6</option>
                                            <option value="7"  {{ optional($mahasiswa)->semester == '7' ? 'selected' : ''}}>7</option>
                                            <option value="8"  {{ optional($mahasiswa)->semester == '8' ? 'selected' : ''}}>8</option>
                                            <option value="9"  {{ optional($mahasiswa)->semester == '9' ? 'selected' : ''}}>9</option>
                                            <option value="10"  {{ optional($mahasiswa)->semester == '10' ? 'selected' : ''}}>10</option>
                                            <option value="11"  {{ optional($mahasiswa)->semester == '11' ? 'selected' : ''}}>11</option>
                                            <option value="12"  {{ optional($mahasiswa)->semester == '12' ? 'selected' : ''}}>12</option>
                                            <option value="13"  {{ optional($mahasiswa)->semester == '13' ? 'selected' : ''}}>13</option>
                                            <option value="14"  {{ optional($mahasiswa)->semester == '14' ? 'selected' : ''}}>14</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Angkatan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ optional($mahasiswa)->angkatan }}"
                                            id="angkatan" name="angkatan" placeholder="Masukkan tahun angkatan">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Kelas</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="kelas">
                                            <option>Pilih Kelas</option>
                                            <option value="A" {{ optional($mahasiswa)->kelas == 'A' ? 'selected' : ''}}>A</option>
                                            <option value="B" {{ optional($mahasiswa)->kelas == 'B' ? 'selected' : ''}}>B</option>
                                            <option value="C" {{ optional($mahasiswa)->kelas == 'C' ? 'selected' : ''}}>C</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email" placeholder="masukkan email aktif" value="{{ optional($mahasiswa)->email }}"> 
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">No.HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="nohp" placeholder="masukkan nomor handphone" value="{{ optional($mahasiswa)->nohp }}">
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamat"  placeholder="masukkan alamat lengkap" value="{{ optional($mahasiswa)->alamat }}">
                                    </div>
                                </div>

                               
                                <div>
                                    <a href="{{ route('lihat.profil') }}" class="btn btn-secondary w-md">Kembali</a>
                                    <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                </div>

                            </form>







                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>

    
@endsection
