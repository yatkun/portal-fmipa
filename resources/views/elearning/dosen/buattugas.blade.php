@extends('template.panel')

@section('content')


    <div class="page-content min-vh-100">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Buat Tugas Baru</h4>
                            <form action="{{ route('tugas.store', ['kode_kelas' => $kode_kelas]) }}" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <label for="projectname" class="col-form-label col-lg-2">Judul Tugas</label>
                                    <div class="col-lg-10">
                                        <input id="judul" name="judul" type="text" class="form-control" placeholder="Masukkan Judul Tugas...">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="deskripsi" class="col-form-label col-lg-2">Deskripsi Tugas</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Tugas..."></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-form-label col-lg-2">Deadline Tugas</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" id="project-date-inputgroup"  data-provide="datepicker" data-date-format="dd M, yyyy" data-date-container="#project-date-inputgroup" data-date-autoclose="true">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="Start Date" name="tglmulai" >
                                            <input type="text" autocomplete="off" class="form-control" placeholder="End Date" name="tglakhir">
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="projectbudget" class="col-form-label col-lg-2">Link File</label>
                                    <div class="col-lg-10">
                                        <input id="link" name="link" type="text" placeholder="Masukkan link file" class="form-control">
                                    </div>
                                </div>
                            
                       
                            <div class="row justify-content-end">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-primary">Buat Tugas</button>
                                    <a href="{{ route('e-learning.detail', ['kode_kelas' => $kode_kelas]) }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
