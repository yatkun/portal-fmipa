@extends('template.panel')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dokumen IKU 1</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="d-xl-flex">
            <div class="w-100">
                <div class="d-md-flex">
                    <div class="w-100">
                        <div class="card">
                            <div class="card-body">
                               
                                <div>
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                            <div class="search-box me-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Search...">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-sm-end">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Tambah Dokumen</button>
                                            </div>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Dokumen IKU 1</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('dokumen.store') }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Nama Dokumen:</label>
                                                                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan nama dokumen">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan keterangan">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label">Link:</label>
                                                                    <textarea class="form-control" name="link" id="message-text" placeholder="masukkan link google drive"></textarea>
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
                                        </div><!-- end col-->
                                    </div>
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-check-all me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif
                                    @if ($message = Session::get('error'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-check-all me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama dokumen</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Waktu unggah</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $data)
                                                             
                                                <tr>
                                                    <td><div class="text-dark fw-medium"><i
                                                                class="mdi mdi-file-document font-size-16 align-middle text-primary me-2"></i>
                                                            {{ $data->judul }}</div></td>
                                                            <td>{{ $data->keterangan; }}</td>
                                                            <td>{{ $data->created_at->format('Y-m-d'); }}</td>
                                                  
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                           
                                                            <a  href="{{ $data->link }}" target=”_blank” class="btn btn-sm btn-outline-primary waves-effect waves-light"><i class="mdi mdi-download font-size-12"></i></a>
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}" class="btn btn-sm btn-outline-success waves-effect waves-light"><i class="mdi mdi-pencil font-size-12"></i></button>
                                                           
                                                            <div class="modal fade" id="editModal{{ $data->id }}" role="dialog" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true" tabindex="-2">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <form action="{{ route('dokumen.update', $data->id) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                            
                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name" class="col-form-label">Nama Dokumen:</label>
                                                                                    <input type="text" name="title" class="form-control" id="recipient-name" placeholder="Masukkan nama dokumen" value="{{ $data->judul }}">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="message-text" class="col-form-label">Link:</label>
                                                                                    <textarea class="form-control" name="link" id="message-text" placeholder="masukkan link google drive" >{{ $data->link }}</textarea>
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
                                                            <form action="{{ route('dokumen.destroy', $data->id) }}" method="POST">
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

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end w-100 -->
                </div>
            </div>

        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->





@endsection