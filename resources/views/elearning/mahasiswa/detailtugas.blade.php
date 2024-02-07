@extends('template.panel')

@section('content')
    @include('sweetalert::alert')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Jawaban Tugas</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-truncate font-size-15">Judul :</h5>
                            <p class="text-muted">{{ $tugas->judul }}</p>

                            <h5 class="font-size-15 mt-4">Deskripsi :</h5>

                            <p class="text-muted">{{ $tugas->deskripsi }}</p>

                            @if ($tugas->link)
                                <h5 class="font-size-15 mt-4">Dokumen :</h5>
                                <a href="{{ $tugas->link }}" target="_blank"><span class="badge badge-soft-success">Dokumen
                                        Pendukung</span></a>
                            @else
                            @endif

                            <div class="row task-dates">
                                <div class="col-sm-4 col-6">
                                    <div class="mt-4">
                                        <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Batas
                                            waktu :
                                        </h5>
                                        <p class="text-muted mb-0">
                                            {{ \Carbon\Carbon::parse($tugas->tglakhir)->isoFormat('dddd, D MMMM Y') }}</p>
                                    </div>
                                </div>
                                @php

                                    $startDate = \Carbon\Carbon::parse($tugas->tglmulai);
                                    $endDate = \Carbon\Carbon::parse($tugas->tglakhir);
                                    $currentDate = \Carbon\Carbon::now();

                                    if ($currentDate >= $startDate && $currentDate <= $endDate) {
                                        $totalDays = $startDate->diffInDays($endDate);
                                        $remainingDays = $currentDate->diffInDays($endDate);
                                        $progress = 100 - ($remainingDays / $totalDays) * 100;
                                        $sisaHari = 'Sisa ' . $remainingDays . ' hari';
                                    } else {
                                        $progress = 0;
                                        $sisaHari = 'Tugas sudah berakhir';
                                    }
                                @endphp

                                {{-- @if ($tugas->tglakhir >= $item->tgl_kirim)
                                    <span class="badge badge-soft-success">Tepat Waktu</span>
                                @else
                                    <span class="badge badge-soft-danger">Terlambat {{ $diffInDays }} Hari</span>
                                @endif --}}
                                @if ($progress > 0)
                                    <div class="mt-2">
                                        <div class="progress progress-xl">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: <?php echo $progress; ?>%;" aria-valuenow="<?php echo $progress; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <?php echo $sisaHari; ?></div>
                                        </div>
                                    </div>
                                @else
                                @endif


                            </div>

                            @if (isset($jawaban))
                                <h5 class="font-size-15 mt-4">Nilai :</h5>
                                @if ($jawaban->nilai == "belum dinilai")
                                <p class="text-primary">{{ $jawaban->nilai }}</p>
                                    @else
                                    <h4 class="text-primary">{{ $jawaban->nilai }}</h4>
                                @endif
                            @else
                            @endif


                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                    @if (isset($jawaban))
                        <div class="alert alert-warning" role="alert">
                            Anda telah mengirimkan jawaban !
                        </div>
                    @else
                    @endif

                </div>
                <div class="col-lg-12">

                    @if (isset($jawaban))
                        <div class="card">

                            <div class="card-body">
                                <form method="POST"
                                    action="{{ route('jawaban.store', ['kode_kelas' => $kelas->kode_kelas, 'id' => $tugas->id]) }}">
                                    @csrf



                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Link Jawaban</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text"
                                                placeholder="Masukkan link google drive" name="link"
                                                value="{{ $jawaban->link }}">
                                        </div>
                                    </div>



                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Deskripsi
                                            Jawaban</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ $jawaban->deskripsi }}</textarea>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-10">
                                            <a href="{{ route('kelas.detail', ['kode_kelas' => $kelas->kode_kelas]) }}"
                                                class="btn btn-secondary w-md">Kembali</a>
                                            <button type="submit" class="btn btn-primary w-md">Kirim tugas</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card">

                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Perhatian!</h4>
                                    <p>Silakan unggah hasil/jawaban tugas ke Google Drive dan berikan tautan (link) tugas pada form di bawah ini.</p>
                                </div>
                                <form method="POST"
                                    action="{{ route('jawaban.store', ['kode_kelas' => $kelas->kode_kelas, 'id' => $tugas->id]) }}">
                                    @csrf



                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Link Jawaban</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text"
                                                placeholder="Masukkan link google drive" name="link">
                                        </div>
                                    </div>



                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Catatan</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="optional"></textarea>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-10">
                                            <a href="{{ route('kelas.detail', ['kode_kelas' => $kelas->kode_kelas]) }}"
                                                class="btn btn-secondary w-md">Kembali</a>
                                            <button type="submit" class="btn btn-primary w-md">Kirim tugas</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif
                </div>

            </div> <!-- end row -->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
