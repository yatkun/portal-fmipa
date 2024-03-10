@extends('template.panel')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Pengguna</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center mb-3">
                            <h4 class="card-title flex-grow-1">Daftar Mahasiswa</h4>
                            <div class="flex-shrink-0">
                                <div class="">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahmahasiswa"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2"><i
                                            class="mdi mdi-plus me-1"></i> Tambah mahasiswa</button>
                                            <div class="modal fade" id="tambahmahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah mahasiswa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('mahasiswa.store') }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">Nama mahasiswa:</label>
                                                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama mahasiswa">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nidn" class="col-form-label">NIM:</label>
                                                                    <input type="text" name="nidn" class="form-control" id="nidn" placeholder="Masukkan NIM">
                                                                    
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="password" class="col-form-label">Password:</label>
                                                                    <input type="text" name="password" class="form-control" id="password" placeholder="Masukkan password">
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

                        @error('nidn')
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
                                    <th>Nama</th>
                                    <th>NIM</th>
                                 
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle">
                                                {{ substr($user->nama, 0, 1) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->nidn }}</td>
                               
                                    <td>

                                        <div class="d-flex gap-1">
                                            
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}" class="btn btn-sm btn-outline-success waves-effect waves-light"><i class="mdi mdi-pencil font-size-12"></i></button>
                                           
                                            <div class="modal fade" id="editModal{{ $user->id }}" role="dialog" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true" tabindex="-2">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit mahasiswa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <form action="{{ route('mahasiswa.update', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                            
                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">Nama mahasiswa:</label>
                                                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama mahasiswa" value="{{ $user->nama }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nidn" class="col-form-label">NIM:</label>
                                                                    <input type="text" name="nidn" class="form-control" id="nidn" placeholder="Masukkan NIM" value="{{ $user->nidn }}">
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
                                            <form action="{{ route('mahasiswa.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-outline-danger waves-effect waves-light"><i class="mdi mdi-delete font-size-12"></i></button>
                                            </form>
                                           
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