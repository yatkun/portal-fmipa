@extends('template.panel')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">E-Learning</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center mb-3">
                            <h4 class="card-title flex-grow-1">Daftar Kelas</h4>
                            <div class="flex-shrink-0">
                                <div class="">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahdosen"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2"><i
                                            class="mdi mdi-plus me-1"></i> Tambah Kelas</button>
                                            <div class="modal fade" id="tambahdosen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('e-learning.store') }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="kode_kelas" class="col-form-label">Kode Kelas:</label>
                                                                    <input type="text" name="kode_kelas" class="form-control" id="kode_kelas" placeholder="Masukkan kode kelas">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama_kelas" class="col-form-label">Nama Kelas:</label>
                                                                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Masukkan nama kelas">
                                                                </div>
                                                                
                                    
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        @endif

                        @error('kode_kelas')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-block-helper me-2"></i>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        @enderror
                        

                        <table id="datatable" class="table align-middle table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th>Nama Kelas</th>
                                    <th>Kode Kelas</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle">
                                                {{ substr($user->nama_kelas, 0, 1) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $user->nama_kelas }}</td>
                                    <td>{{ $user->kode_kelas }}</td>
                                 
                                    <td>

                                        <div class="d-flex gap-1">
                                                <a href="{{ route('e-learning.detail', ['kode_kelas' => $user->kode_kelas]) }}" class="btn btn-sm btn-outline-success waves-effect waves-light">Masuk Kelas</a>
                                          
                                           
                                        </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->





@endsection