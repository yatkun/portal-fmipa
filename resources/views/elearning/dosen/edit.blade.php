@extends('template.panel')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Kelas</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Informasi Kelas</h4>


                            <form method="POST"
                                action="{{ route('e-learning.update', ['kode_kelas' => $kelas->kode_kelas]) }}">
                                @csrf
                                @method('PUT')


                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Kelas</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ $kelas->nama_kelas }}"
                                            name="nama_kelas">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Kode Kelas</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="{{ $kelas->kode_kelas }}"
                                            name="kode_kelas">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Deskripsi Kelas</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ optional($kelas->deskripsi)->deskripsi }}</textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-10">
                                        <a href="{{ route('e-learning.detail', ['kode_kelas' => $kelas->kode_kelas]) }}" class="btn btn-secondary w-md">Kembali</a>
                                        <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                    </div>
                                </div>

                            </form>







                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
