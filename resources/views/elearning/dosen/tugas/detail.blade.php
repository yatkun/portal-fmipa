@extends('template.panel')

@section('css')
    <style>
        .input {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            border: 1px solid #fff;
            padding: 8px 10px;
        }

        .input:hover {
            /*border:1px dashed #999;*/
            transition: border .2s ease-in;
        }

        .input:focus {
            background-color: #efefef;
            border: 1px dashed #999;
            transition: border .2s ease-in;
            outline: 0;
        }

        input.title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        input.sub-title {
            font-size: 16px;
            color: #333;
        }

        input.paragraph {
            font-size: 14px;
            color: #333;
        }
        .deskripsi-detail p {
    margin-bottom: 0 !important; /* Atur margin bawah menjadi 0 untuk tag <p> di dalam elemen dengan kelas deskripsi-detail */
}
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18 w-full">{{ $tugas->kelas->nama_kelas }} | {{ $tugas->judul }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body border-bottom">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 card-title flex-grow-1"><a
                                        href="{{ route('e-learning.detail', ['kode_kelas' => $kelas->kode_kelas]) }}"
                                        class="btn btn-info">Kembali</a></h5>

                                <div class="flex-shrink-0">
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('e-learning.tugas.edit', ['kode_kelas' => $kelas->kode_kelas, 'id' => $tugas->id]) }}"
                                            class="btn btn-primary"><i class="mdi mdi-pencil"></i></a>
                                        <form
                                            action="{{ route('tugas.delete', ['kode_kelas' => $kelas->kode_kelas, 'id' => $tugas->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')"
                                                class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">


                            <h5 class="font-size-15">Deskripsi :</h5>

                            <p class="text-muted deskripsi-detail">{!! $tugas->deskripsi !!}</p>

                            @if ($tugas->link)
                                <h5 class="font-size-15 mt-4">Dokumen :</h5>
                                <a href="{{ $tugas->link }}" target="_blank"><span class="badge badge-soft-success">Dokumen
                                        Pendukung</span></a>
                            @else
                            @endif



                            <div class="row task-dates">
                                <div class="col-sm-4 col-6">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Deadline
                                        </h5>
                                        <p class="text-muted mb-0">
                                            {{ \Carbon\Carbon::parse($tugas->tglakhir)->isoFormat('dddd, D MMMM Y') }}</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div> <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                {{-- <h4 class="card-title flex-grow-1">Jawaban Mahasiswa</h4> --}}
                                <div class="flex-shrink-0">


                                </div>
                            </div>




                            <table id="datatable" class="table align-middle table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 50px;">#</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Jawaban</th>
                                        <th>Status</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($jawaban as $item)
                                        <tr>
                                            <td>
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle">
                                                        {{ substr($item->kelasUser->user->nama, 0, 1) }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>{{ $item->kelasUser->user->nama }}</td>
                                            <td>

                                                {{-- <a href={{ route('e-learning.jawaban.detail', ['kode_kelas' => $kelas->kode_kelas, 'id' => $item->id, 'user_id' => $item->kelasUser->user_id]) }}
                                                    data-name="link" data-type="text" data-pk="{{ $item->link }}"
                                                    class="btn btn-sm btn-outline-success waves-effect waves-light">Buka</a> --}}
                                                    <button type="button" class="btn btn-sm btn-outline-success waves-effect waves-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#myModal{{ $item->id }}">Lihat</button>
                                            </td>

                                            <td>

                                                <div class="d-flex gap-1 items-center">

                                                    @php
                                                        $startDate = \Carbon\Carbon::parse($tugas->tglakhir);
                                                        $endDate = \Carbon\Carbon::parse($item->tgl_kirim);
                                                        $diffInDays = $startDate->diffInDays($endDate);
                                                    @endphp

                                                    @if ($tugas->tglakhir >= $item->tgl_kirim)
                                                        <span class="badge badge-soft-success">Tepat Waktu</span>
                                                    @else
                                                        <span class="badge badge-soft-danger">Terlambat {{ $diffInDays }}
                                                            Hari</span>
                                                    @endif

                                                </div>
                                            </td>
                                            <td>{{ $item->nilai }}</td>
                                            {{-- <td style="width: 10%"><a href="{{ route('jawaban.update', ['kode_kelas' => $kelas->kode_kelas, 'id' => $tugas->id]) }}" class="update" data-name="nilai" data-type="text" data-pk="{{ $item->id }}" data-title="Masukkan nilai" data-method="PUT">{{ $item->nilai }}</a></td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @foreach ($jawaban as $item)
        <div id="myModal{{ $item->id }}" class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('nilai.update', ['kode_kelas' => $kelas->kode_kelas, 'id' => $item->kelas_user_id, 'tugas' => $tugas->id]) }}" method="post">
                    @csrf
                    @method('put')
                        <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Detail Jawaban {{ $item->kelasUser->user->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            @if (!empty($item->kelasUser->user->mahasiswaProfile->foto))
                                    <!-- Gunakan gambar profil yang telah diunggah -->
                                    <img src="{{ asset('storage/profile_image/' . $item->kelasUser->user->mahasiswaProfile->foto) }}"
                                        alt="Foto Profil" class="img-thumbnail rounded-circle avatar-lg"
                                        style="background-size:cover;object-fit:cover !important;">
                                @else
                                    <!-- Gunakan gambar default -->
                                    <img src="{{ asset('storage/profile_image/avatar.png') }}" alt="Foto Profil"
                                        class="img-thumbnail rounded-circle avatar-lg">
                                @endif
                        </div>
                        <div class="text-center">
                  
                                <div class="text-muted">
                                    <h5 class="mb-1">{{ $item->kelasUser->user->nama }}</h5>
                                    <p class="mb-0">{{ optional($item->kelasUser->user->mahasiswaProfile)->prodi }}</p>
                                    <p class="mb-0">{{ optional($item->kelasUser->user->mahasiswaProfile)->angkatan }}{{ optional($item->kelasUser->user->mahasiswaProfile)->kelas }}</p>
                                </div>
                             
                        </div>
                   
                        <div class="table-responsive mt-2">
                            <table class="table table-striped mb-0">

                              
                                <tbody>
                                    <tr>
                                     
                                        <td>Link Tugas</td>
                                      
                                        <td><a href={{ $item->link }} target="_blank"
                                            class="btn btn-sm btn-outline-primary waves-effect waves-light font-size-16">
                                                <i class="mdi mdi-file-document"></i>
                                            </div></a></td>
                                    
                                    </tr>
                                    <tr>
                                        <td>Pengiriman</td>
                                        <td>{{ $item->tgl_kirim }}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="width: 20%">Nilai</td>
                                        <td><input class="form-control" name="nilai" type="number"  placeholder="Masukkan nilai" id="example-number-input" value="{{ optional($item)->nilai }}"></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Tanggapan</td>
                                        <td><textarea id="textarea" name="tanggapan" class="form-control" maxlength="225" rows="3" placeholder="Masukkan tanggapan (opsional)" style="height: 146px;">{{ optional($item)->tanggapan }}</textarea></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>

                </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection


@section('js')
@endsection
