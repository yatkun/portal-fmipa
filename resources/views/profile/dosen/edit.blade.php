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
                            <p class="card-title-desc">Data ini dapat bersifat <code>public</code></p>

                            <form method="POST" action="{{ route('update.profil') }}">
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
                                    <label for="example-text-input" class="col-md-2 col-form-label">NIDN/NIP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ auth()->user()->nidn }}"
                                            id="nidn" name="nidn">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email" placeholder="masukkan email aktif" value="{{ optional($dosen)->email }}"> 
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">No.HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="nohp" placeholder="masukkan nomor handphone" value="{{ optional($dosen)->nohp }}">
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="alamat"  placeholder="masukkan alamat lengkap" value="{{ optional($dosen)->alamat }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Google Scholar</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="google_scholar" value="{{ optional($dosen)->google_scholar }}" placeholder="masukkan link google scholar">
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
